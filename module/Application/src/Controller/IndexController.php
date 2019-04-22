<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\Placeholder\Container;
use Zend\View\Model\ViewModel;






use Application\Model\Task;



class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $tasks = Task::getTaskList();

        if(isset($_POST['submit'])) {
            if(!empty($_POST['task'])) {
                $task = $_POST['task'];

                Task::addTask($task);

                header('Refresh:0');
            }
        }

        return new ViewModel(['tasks'=>$tasks]);
    }

    public function deleteAction(){

        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            Task::deleteTask($id);
        }

        return $this->redirect()->toUrl('/');
    }
}
