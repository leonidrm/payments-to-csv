<?php
namespace PaymentDay;

/**
 * Class OutputFormat
 * @package PaymentDay
 */
class OutputFormat
{
    /**
     * @var array
     */
    protected $data;

    /**
     * OutputFormat constructor.
     * @param Salary $salaryDates
     * @param Bonus $bonusDates
     */
    public function __construct(Salary $salaryDates, Bonus $bonusDates)
    {
        $salaryDates = $salaryDates->getPaymentDates();

        $bonusDates  = $bonusDates->getPaymentDates();

        $this->sortData($salaryDates, $bonusDates);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $salaryDates
     * @param $bonusDates
     */
    protected function sortData(array $salaryDates, array $bonusDates)
    {
        if(count($salaryDates) != count($bonusDates))
        {
            array_unshift($bonusDates, 0);
        }

        foreach( $salaryDates as $key => $date)
        {
            $this->data[$date] = ['salary' => date('j', $date), 'bonus' => date('j', $bonusDates[$key])];
        }
    }

    /**
     * @param string $path
     */
    public function createCSV(string $path)
    {
        $data = $this->getData();

        if(!$data) return;

        $payments = [];

        foreach($data as $key => $row) {
            $payments[] = [
                'Month' => date('F', $key),
                'Salary'=> $row['salary'],
                'Bonus' => $row['bonus'] > 1 ? $row['bonus'] : 'None'
            ];
        }

        $output = fopen($path,'w') or die("Can't open {$path}");

        fputcsv($output, array('Month','Salary','Bonus'));

        foreach($payments as $payment)
        {
            fputcsv($output, $payment);
        }

        fclose($output) or die("Can't close {$path}");
    }
}