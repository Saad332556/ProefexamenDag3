<?php
	class PersonenInfo extends Controller
	{
        private $persooninfoModel;

		public function __construct() 
		{           
			$this->persooninfoModel = $this->model('PersoonInfo');
		}

		public function index() 
		{   
            /**
            * Haal via de method getPersoonInfo() uit de model PersoonInfo de records op
            * uit de database
            */
            $persooninfo = $this->persooninfoModel->getPersoonInfo();

            /**
            * Maak de inhoud voor de tbody in de view
            */
            $rows = '';
            foreach ($persooninfo as $value){
                $rows .= "<tr>
                    <td>$value->Voornaam</td>
                    <td>$value->Tussenvoegsel</td>
                    <td>$value->Achternaam</td>
                    <td>$value->Mobiel</td>
                    <td>$value->Email</td>
                    <td>$value->IsVolwassen</td>
                    </tr>";
                }


            $data = [
            'title' => 'Overzicht klanten',
            'persooninfo' => $rows
            ];

            // Load the view
			$this->view('personeninfo/index', $data);
		}

    }