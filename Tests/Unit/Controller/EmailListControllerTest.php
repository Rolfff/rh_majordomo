<?php
namespace Rh\RhMajordomo\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Rolf Huesmann 
 */
class EmailListControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rh\RhMajordomo\Controller\EmailListController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Rh\RhMajordomo\Controller\EmailListController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllEmailListsFromRepositoryAndAssignsThemToView()
    {

        $allEmailLists = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $emailListRepository = $this->getMockBuilder(\Rh\RhMajordomo\Domain\Repository\EmailListRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $emailListRepository->expects(self::once())->method('findAll')->will(self::returnValue($allEmailLists));
        $this->inject($this->subject, 'emailListRepository', $emailListRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('emailLists', $allEmailLists);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenEmailListToView()
    {
        $emailList = new \Rh\RhMajordomo\Domain\Model\EmailList();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('emailList', $emailList);

        $this->subject->showAction($emailList);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenEmailListToEmailListRepository()
    {
        $emailList = new \Rh\RhMajordomo\Domain\Model\EmailList();

        $emailListRepository = $this->getMockBuilder(\Rh\RhMajordomo\Domain\Repository\EmailListRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $emailListRepository->expects(self::once())->method('add')->with($emailList);
        $this->inject($this->subject, 'emailListRepository', $emailListRepository);

        $this->subject->createAction($emailList);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenEmailListToView()
    {
        $emailList = new \Rh\RhMajordomo\Domain\Model\EmailList();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('emailList', $emailList);

        $this->subject->editAction($emailList);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenEmailListInEmailListRepository()
    {
        $emailList = new \Rh\RhMajordomo\Domain\Model\EmailList();

        $emailListRepository = $this->getMockBuilder(\Rh\RhMajordomo\Domain\Repository\EmailListRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $emailListRepository->expects(self::once())->method('update')->with($emailList);
        $this->inject($this->subject, 'emailListRepository', $emailListRepository);

        $this->subject->updateAction($emailList);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenEmailListFromEmailListRepository()
    {
        $emailList = new \Rh\RhMajordomo\Domain\Model\EmailList();

        $emailListRepository = $this->getMockBuilder(\Rh\RhMajordomo\Domain\Repository\EmailListRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $emailListRepository->expects(self::once())->method('remove')->with($emailList);
        $this->inject($this->subject, 'emailListRepository', $emailListRepository);

        $this->subject->deleteAction($emailList);
    }
}
