<?php
namespace PaymentDay;

/**
 * Class Calendar
 * @package PaymentDay
 */
class Calendar
{
    /**
     * @var int
     */
    protected $dayOfMonth;

    /**
     * @var int
     */
    protected $month;

    /**
     * Calendar constructor.
     * @param PaymentDay $payment
     */
    public function __construct(PaymentDay $payment)
    {
        $this->setMonth(date('n'));

        $this->dayOfMonth   = $payment->getPaymentDay();
    }

    /**
     * @param int $dayOfMonth
     */
    public function setDayOfMonth(int $dayOfMonth)
    {
        $this->dayOfMonth = $dayOfMonth;
    }

    /**
     * @param int $month
     */
    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getDayOfMonth()
    {
        return $this->dayOfMonth;
    }

    /**
     * @return false|string
     */
    public function getFormattedMonth()
    {
        return date('F', mktime(0,0,0,$this->getMonth(), $this->getDayOfMonth() ));
    }

    /**
     * @return false|string
     */
    public function getDayOfWeek()
    {
        return date('l', mktime(0,0,0,$this->getMonth(), $this->getDayOfMonth() ));
    }

    /**
     * @return false|int
     */
    public function getDate()
    {
        return mktime(0,0,0,$this->getMonth(), $this->getDayOfMonth() );
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }
}