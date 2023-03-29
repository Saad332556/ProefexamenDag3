<p><h3><?= $data["title"];?></h3></p>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>

<table>
  <thead>
    <th>Voornaam</th>
    <th>Tussenvoegsel</th>
    <th>Achternaam</th>
    <th>Aantalpunten</th>
    <th>Wijzigen</th>
  </thead>
  <tbody>
    <?=$data['game']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

