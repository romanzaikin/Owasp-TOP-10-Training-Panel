<?php
class Employee 
{
	public $name;
	public $age;
	public $salary;

	function __construct($name, $age, $salary) 
	{
		$this->name = $name;
		$this->age = $age;
		$this->salary = $salary;
	}

	function set_salary($salary)
	{
		$this->salary = $salary;
	}

	function get_salary()
	{
		echo $this->salary ."<br/>";
	}

	function set_name($name)
	{
		$this->name = $name;
	}

	function get_name()
	{
		echo $this->name ." <br/>";
	}
	
	function set_age($age)
	{
		$this->age = $age;
	}

	function get_age()
	{
		echo $this->age ." <br/>";
	}
}

$emp = new Employee("roman",28,"100");

echo $emp->get_name();
echo $emp->get_age();
echo $emp->get_salary();

?>