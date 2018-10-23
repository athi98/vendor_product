<html>
<body>
  <?php
  $path = "https://docs.google.com/document/d/1Q-4repr4bKt6btBQ-PrHJF_dVZ1889EoSAEsfo-pZvw/edit?usp=sharing"; // path to your JSON file
  $data = file_get_contents($path); // put the contents of the file into a variable
  $obj = json_decode($data, TRUE);

  foreach($obj as $vend => $prod)
  {
  $url =" https://cve.circl.lu/api/search/".$vend."/".$prod;
  $content = file_get_contents($url);
  $characters = json_decode($content);
  <table>
          <tbody>
              <tr>
                  <th>Published</th>
                  <th>CWE</th>
                  <th>CVE ID</th>
                  <th>Modified</th>
                  <th>Summary</th>
              </tr>
              <?php foreach ($characters as $character) : ?>
              <tr>
                  <td> <?php echo $character->Published; ?> </td>
                  <td> <?php echo $character->cwe; ?> </td>
                  <td> <?php echo $character->id; ?> </td>
                  <td> <?php echo $character->Modified; ?> </td>
                  <td> <?php echo $character->summary; ?> </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
  </table>
  }
  ?>

</body>
</html>
