<?php
namespace Rh\RhMajordomo\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Rolf Huesmann 
 */
class EmailListTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rh\RhMajordomo\Domain\Model\EmailList
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Rh\RhMajordomo\Domain\Model\EmailList();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDigestNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDigestName()
        );
    }

    /**
     * @test
     */
    public function setDigestNameForStringSetsDigestName()
    {
        $this->subject->setDigestName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'digestName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getListNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getListName()
        );
    }

    /**
     * @test
     */
    public function setListNameForStringSetsListName()
    {
        $this->subject->setListName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'listName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getListEmailAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getListEmailAddress()
        );
    }

    /**
     * @test
     */
    public function setListEmailAddressForStringSetsListEmailAddress()
    {
        $this->subject->setListEmailAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'listEmailAddress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailModeratorReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmailModerator()
        );
    }

    /**
     * @test
     */
    public function setEmailModeratorForStringSetsEmailModerator()
    {
        $this->subject->setEmailModerator('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'emailModerator',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getApprovePasswdReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getApprovePasswd()
        );
    }

    /**
     * @test
     */
    public function setApprovePasswdForStringSetsApprovePasswd()
    {
        $this->subject->setApprovePasswd('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'approvePasswd',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMajordomoMailBoxReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMajordomoMailBox()
        );
    }

    /**
     * @test
     */
    public function setMajordomoMailBoxForStringSetsMajordomoMailBox()
    {
        $this->subject->setMajordomoMailBox('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'majordomoMailBox',
            $this->subject
        );
    }
}
