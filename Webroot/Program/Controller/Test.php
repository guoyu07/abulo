<?php



namespace App\Controller;

use Kernel\Components\Cluster\ClusterProcess;
use Kernel\Components\Consul\ConsulHelp;
use Kernel\Components\Process\ProcessManager;
use Kernel\Components\SDHelp\SDHelpProcess;
use Kernel\CoreBase\Controller;
use Kernel\SwooleMarco;

/**
 *
 */
class Test extends Controller
{
    public function health()
    {
        $this->http_output->end('ok');
    }


    /**
     * @param $data
     */
    protected function autoSend($data)
    {
        if (is_array($data) || is_object($data)) {
            $output = json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            $output = $data;
        }
        switch ($this->request_type) {
            case SwooleMarco::TCP_REQUEST:
                $this->send($output);
                break;
            case SwooleMarco::HTTP_REQUEST:
                $this->http_output->setHeader("Access-Control-Allow-Origin", "*");
                $this->http_output->end($output);
                break;
        }
    }

    public function status()
    {
        // $node_name = 'SD-1';
        // $index = 0;
        //  $num = 100;
        // if (!getInstance()->isCluster() || $node_name == getNodeName()) {
        //     $map = yield ProcessManager::getInstance()->getRpcCall(SDHelpProcess::class)->getStatistics($index, $num);
        // } else {
        //     $map = yield ProcessManager::getInstance()->getRpcCall(ClusterProcess::class)->my_getStatistics($node_name, $index, $num);
    // }
        // $uids = yield getInstance()->coroutineGetAllUids();
        // $this->autoSend($uids);
        // $this->autoSend($map);

        // yield $this->getRedisProxy('pools')->set('test', time());

        // $value = yield $this->getRedisProxy('pools')->get('test');

        $this->http_output->end('OK');
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
