<?php
	class Games extends Controller
	{
        private $gameModel;

		public function __construct() 
		{           
			$this->gameModel = $this->model('Game');
		}

		public function index() 
		{   
            /**
            * Haal via de method getPersoonInfo() uit de model PersoonInfo de records op
            * uit de database
            */
            $game = $this->gameModel->getGames();

            /**
            * Maak de inhoud voor de tbody in de view
            */
            $rows = '';
            foreach ($game as $value){
                $rows .= "<tr>
                    <td>$value->Voornaam</td>
                    <td>$value->Tussenvoegsel</td>
                    <td>$value->Achternaam</td>
                    <td>$value->Aantalpunten</td>
                    <td><a href='" . URLROOT . "/games/update/$value->Id'>update</a></td>
                    </tr>";
                }


            $data = [
            'title' => 'Overzicht spelen',
            'game' => $rows
            ];

            // Load the view
			$this->view('games/index', $data);
		}

        public function update($id = null)
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      try {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Update the data with the form data
        $this->gameModel->updateGameScore($_POST);

        // Redirect to the index page
        header('Location: ' . URLROOT . '/games/index');
      } catch (PDOException $e) {
        // Show the error message
        echo 'Er is iets misgegaan tijdens het bewerken van een land (PDOException)';
        header('Refresh: 2; url=' . URLROOT . '/games/index');
      }
    } else {
      $row = $this->gameModel->getSingleGame($id);

      $data = [
        'title' => '<h1>Update landenoverzicht</h1>',
        'row' => $row
      ];

      $this->view('games/update', $data);
    }
  }

    }