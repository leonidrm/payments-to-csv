<?php
namespace PaymentDay;

/**
 * Class PaymentDay
 * @package PaymentDay
 */
abstract class PaymentDay
{
    /**
     * @var integer
     */
    private $paymentDay;

    /**
     * @var array
     */
    private $paymentDates;

    /**
     * @return int
     */
    public function getPaymentDay()
    {
        return $this->paymentDay;
    }

    /**
     * @param Calendar $calendar
     * @return int
     */
    protected function getAdjustedPaymentDay(Calendar $calendar)
    {
        $dayOfWeek = $calendar->getDayOfWeek();

        if(in_array($dayOfWeek, ['Saturday','Sunday']))
        {
            $adjustedDay = $dayOfWeek == 'Saturday' ? 1 : 2;

            $calendar->setDayOfMonth( $calendar->getDayOfMonth() - $adjustedDay);
        }

        return $calendar->getDate();
    }

    /**
     * @return array
     */
    public function getPaymentDates()
    {
        return $this->paymentDates;
    }

    /**
     * @param int $day
     */
    protected function setPaymentDay(int $day)
    {
        $this->paymentDay = $day;
    }

    public function nextYearPaymentDates()
    {
        $nrOfMonths = date('j') > 15 && $this->getPaymentDay() < 13 ? 13 : 12;

        for($month = 1; $month <= $nrOfMonths; $month++)
        {
            $calendar = new Calendar($this);

            $calendar->setMonth($calendar->getMonth() + $month);

            $this->paymentDates[] = $this->getAdjustedPaymentDay($calendar);
        }
    }
}