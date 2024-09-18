<?php

function call_name(): string{
  $name = "Niwenyesiga Isaac";

return $name;
}

function my_age($c_year, $dob): float|int{
  $age = $c_year - $dob;
return $age;
}

function home_address(): string{
  $address = "Uganda-Kabale-Karujjabura";
  return $address;
}
print ("Hello ".call_name()."! <br> You were born in 2000 and your home address is ".home_address()."<br>"."You are ".my_age(c_year: 2024, dob: 2000));

