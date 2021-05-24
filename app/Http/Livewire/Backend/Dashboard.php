<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Analytic;
use Analytics as GoogleAnalytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Dashboard extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'dashboard';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $analytics;

    public $startDate, $endDate;

    public $getRangeError = false;

    public $tabUsersCount;
    public $usersData, $usersCount;

    public $tabSessionsCount;
    public $sessionsData, $sessionsCount;

    public $tabBounceRateCount;
    public $bounceRatesData, $bounceRatesCount;

    public $tabSessionDurationCount;
    public $sessionDurationsData, $sessionDurationsCount;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {                       
        if(request('startDateRange') && request('endDateRange')) {
            $this->startDate = Carbon::parse(request('startDateRange'));
            $this->endDate   = Carbon::parse(request('endDateRange'));
        } else {
            $this->startDate = Carbon::now()->subDays(7);
            $this->endDate   = Carbon::now();
        }
        $this->analytics = Analytic::where('active',1)->get();

        if($this->startDate > $this->endDate) {
            return redirect('webadmin/dashboard?greater=true');
        }
        if(request('greater')) {
            $this->getRangeError = true;
        }

        // users
        $tabUsers = GoogleAnalytics::performQuery(
            Period::create($this->startDate, $this->endDate),
            'ga:users',
        );
        $this->tabUsersCount = array(
            'return' => $tabUsers['totalsForAllResults']['ga:users'],
        );
        $globalVisitors = GoogleAnalytics::performQuery(
            Period::create($this->startDate, $this->endDate),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:date',
            ]
        );
        $globalVisitorItems = [];
        $tabUserCount = 0;
        foreach($globalVisitors as $key => $globalVisitor) {
            $globalDate = substr($globalVisitor[0],0,4).'-'.substr($globalVisitor[0],4,2).'-'.substr($globalVisitor[0],6,2);
            $globalVisitorsDay   = substr($globalVisitor[0],-2);
            $globalVisitorsMonth = date('M',strtotime($globalDate));
            $globalVisitorItems[] = array(
                'name'   => $globalVisitorsDay.' '.$globalVisitorsMonth,
                'return' => intval($globalVisitor[1]),
                'y'      => intval($globalVisitor[1]),
                'color'  => '#ecc94b',
            );
            $tabUserCount += $globalVisitor[1];
        }
        $this->usersData   = $globalVisitorItems;
        $this->usersCount  = intval($tabUserCount / 2);
        // sessions
        $tabSessions = GoogleAnalytics::performQuery(
            Period::create($this->startDate, $this->endDate),
            'ga:sessions,ga:sessionDuration',
        );
        $this->tabSessionsCount = array(
            'return' => $tabSessions['totalsForAllResults']['ga:sessions'],
        );
        $sessions = GoogleAnalytics::performQuery(
            Period::create($this->startDate, $this->endDate),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions',
                'dimensions' => 'ga:date',
            ]
        );
        $sessionItems = [];
        $tabSessionCount = 0;
        foreach($sessions as $key => $session) {
            $sessionDate  = substr($session[0],0,4).'-'.substr($session[0],4,2).'-'.substr($session[0],6,2);
            $sessionDay   = substr($session[0],-2);
            $sessionMonth = date('M',strtotime($sessionDate));
            $sessionItems[] = array(
                'name'   => $sessionDay.' '.$sessionMonth,
                'return' => intval($session[1]),
                'y'      => intval($session[1]),
                'color'  => '#ecc94b',
            );
            $tabSessionCount += $session[1];
        }

        $this->sessionsData = $sessionItems;
        $this->sessionsCount  = intval($tabSessionCount / 1.15);

        // bounce rate
        $tabBounceRate = GoogleAnalytics::performQuery(
            Period::create($this->startDate, $this->endDate),
            'ga:sessions',
            [
                'metrics' => 'ga:bounceRate',
                'dimensions' => 'ga:date',
            ]
        );
        $this->tabBounceRateCount = array(
            'return' => number_format($tabBounceRate['totalsForAllResults']['ga:bounceRate'],2),
        );
        
        $bounceRates = GoogleAnalytics::performQuery(  
            Period::create($this->startDate, $this->endDate),
            'ga:bounces',
            [
                'metrics' => 'ga:bounceRate',
                'dimensions' => 'ga:date',
            ]
        );
        $bounceRateItems = [];
        $bounceRateCount = 0;
        foreach($bounceRates as $key => $bounceRate) {
            $dateBounceDate  = substr($bounceRate[0],0,4).'-'.substr($bounceRate[0],4,2).'-'.substr($bounceRate[0],6,2);
            $dateBounceDay   = substr($bounceRate[0],-2);
            $dateBounceMonth = date('M',strtotime($dateBounceDate));
            //$dateBounceYear  = date('Y',strtotime(substr($bounceRate[0],0,4)));
            $bounceRateItems[] = array(
                'name'   => $dateBounceDay.' '.$dateBounceMonth,
                'return' => $bounceRate[1] <> '0.0' ? (float)number_format($bounceRate[1],1) : 0,
                'y'      => $bounceRate[1] <> '0.0' ? (float)number_format($bounceRate[1],1) : 0,
                'color'  => '#ecc94b',
            );
            $bounceRateCount += $bounceRate[1];
        } 
        $this->bounceRatesData = $bounceRateItems;
        $this->bounceRatesCount  = intval($bounceRateCount);

        // session duration
        $tabSessionDuration = GoogleAnalytics::performQuery(
            Period::create($this->startDate, $this->endDate),
            'ga:avgSessionDuration',
        );
        $TabSessionDurationData = date('i:s', (int) $tabSessionDuration['totalsForAllResults']['ga:avgSessionDuration']);
        $avgTimeDurationExplode = explode(':',$TabSessionDurationData);
        $this->tabSessionDurationCount = $avgTimeDurationExplode[0].'m '.$avgTimeDurationExplode[1].'s';

        $sessionDurations = GoogleAnalytics::performQuery(  
            Period::create($this->startDate, $this->endDate),
            'ga:sessionDuration',
            [
                'metrics' => 'ga:sessionDuration,ga:avgSessionDuration',
                'dimensions' => 'ga:date',
                'sort' => 'ga:date',
            ]
        );
        $sessionDurationsItems = [];
        $sessionDurationCount = 0;
        foreach($sessionDurations as $key => $sessionDuration) {
            $dateSessionDurationDate  = substr($sessionDuration[0],0,4).'-'.substr($sessionDuration[0],4,2).'-'.substr($sessionDuration[0],6,2);
            $dateSessionDurationDay   = substr($sessionDuration[0],-2);
            $dateSessionDurationMonth = date('M',strtotime($dateSessionDurationDate));
            $timeDuration = date('i:s', (int) $sessionDuration[2]);
            if($timeDuration <> '00:00') {
                $timeDurationExplode = explode(':',$timeDuration);
                $printDuration = $timeDurationExplode[0].'m '.$timeDurationExplode[1].'s';
            } else {
                $printDuration  = '00m 00s';
            }
            $sessionDurationsItems[] = array(
                'name'   => $dateSessionDurationDay.' '.$dateSessionDurationMonth,
                'return' => $printDuration,
                'y'      => $sessionDuration[1] <> '0.0' ? (float)number_format($sessionDuration[1],1) : 0,
                'color'  => '#ecc94b',
            );
            $sessionDurationCount += $sessionDuration[1];
        } 
        $this->sessionDurationsCount  = intval($sessionDurationCount);
        $this->sessionDurationsData = $sessionDurationsItems;

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst($this->module);

        $hex = array('#ecc94b','#fbcc49','#cb4645','#00bcd4','#d1e0c6');

        return view('livewire.backend.dashboard.index',compact('pageName'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function getRange()
    {
        $this->startDate = Carbon::parse(request('startDateRange'));
        $this->endDate   = Carbon::parse(request('endDateRange'));
    }

}
