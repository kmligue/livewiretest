<?php

namespace App\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $page = 1;
    public $first_name = '';
    public $last_name = '';
    public $address = '';
    public $city = '';
    public $country = '';
    public $dob_month = '';
    public $dob_day = '';
    public $dob_year = '';
    public $is_married = 'no';
    public $marriage_date_month = '';
    public $marriage_date_day = '';
    public $marriage_date_year = '';
    public $marriage_country = '';
    public $widowed = 'no';
    public $married_in_past = 'no';

    public $marriage_date_error = '';
    public $disable_submit = false;

    public function next()
    {
        $this->page = $this->page + 1;
    }

    public function previous()
    {
        $this->page = $this->page - 1;
    }

    public function submit()
    {
        $this->page = $this->page + 1;
    }

    public function validateMarriageDate()
    {
        if ($this->is_married == 'yes') {
            $married_date = $this->marriage_date_year . '-' . $this->marriage_date_month . '-' . $this->marriage_date_day;
            $dob = $this->dob_year . '-' . $this->dob_month . '-' . $this->dob_day;

            // check year difference between dob and marriage date
            $diff = date_diff(date_create($dob), date_create($married_date));

            if ($diff->y < 18) {
                $this->marriage_date_error = 'You are not eligible to apply because your marriage occurred before your 18th birthday.';
                $this->disable_submit = true;
            } else {
                $this->marriage_date_error = '';
                $this->disable_submit = false;
            }
        } else {
            $this->marriage_date_error = '';
            $this->disable_submit = false;
        }
    }

    public function resetMarriageData()
    {
        $this->marriage_date_month = date('m');
        $this->marriage_date_day = date('d');
        $this->marriage_date_year = date('Y');
        $this->marriage_country = '';
        $this->widowed = 'no';
        $this->married_in_past = 'no';
        $this->marriage_date_error = '';
    }

    public function mount()
    {
        $this->dob_month = date('m');
        $this->dob_day = date('d');
        $this->dob_year = date('Y');
        $this->marriage_date_month = date('m');
        $this->marriage_date_day = date('d');
        $this->marriage_date_year = date('Y');
    }

    public function render()
    {
        return view('livewire.form');
    }
}
