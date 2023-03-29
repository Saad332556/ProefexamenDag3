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
    <th>Mobiel</th>
    <th>Email</th>
    <th>Volwassen</th>
  </thead>
  <tbody>
    <?=$data['persooninfo']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

