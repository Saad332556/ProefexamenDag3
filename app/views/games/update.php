<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/games/update" method="post">
  <table>
    <tbody>
      <tr>
        <td>
          Aantalpunten :
          <input type="text" name="aantalpunten" id="aantalpunten" value="<?= $data["row"]->Aantalpunten; ?>">
        </td>
      </tr>
      <tr>
        <td>
          <input type="hidden" name="id" value="<?= $data["row"]->Id; ?>">
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Wijzigen">
        </td>
      </tr>
    </tbody>
  </table>

</form>

<a href="<?= URLROOT;?>/games/index">terug</a>