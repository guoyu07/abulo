<?php



namespace App\Controller;

// use Kernel\CoreBase\Controller;
use Kernel\Components\Cluster\ClusterProcess;
use Kernel\Components\Consul\ConsulHelp;
use Kernel\Components\Process\ProcessManager;
use Kernel\Components\SDHelp\SDHelpProcess;
use Kernel\CoreBase\Controller;

/**
 *
 */
class Test extends Controller
{
    public function health()
    {
        $this->http_output->end('ok');
    }


    // public function status()
    // {
    //
    //     $status = getInstance()->server->stats();
    //     $status['now_task'] = getInstance()->getServerAllTaskMessage();
    //     if ($this->config['consul']['enable']) {
    //         $data = yield ProcessManager::getInstance()->getRpcCall(SDHelpProcess::class)->getData(ConsulHelp::DISPATCH_KEY);
    //         if (!empty($data)) {
    //             foreach ($data as $key => $value) {
    //                 $data[$key] = json_decode($value, true);
    //                 foreach ($data[$key] as &$one) {
    //                     $one = $one['Service'];
    //                 }
    //             }
    //         }
    //         $status['consul_services'] = $data;
    //         if ($this->config['cluster']['enable']) {
    //             $data = yield ProcessManager::getInstance()->getRpcCall(ClusterProcess::class)->getStatus();
    //             $status['cluster_nodes'] = $data['nodes'];
    //             $status['uidOnlineCount'] = $data['count'];
    //         }
    //     }
    //     // $status['sss'] = getInstance()->getStatus(1);
    //     $this->http_output->end($status);
    // }
}
