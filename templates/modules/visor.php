<?php //visualizador de archivo , recibe el archivo y lo muestra en un iframe de google docs
if (isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) && isset($_GET['fl'])) { ?>
  <link rel="icon" href="../assets/Logo_Neo_Corto.png">
  <script>
      function cargar()
      {
         
    location.href="https://neo.cpcoriente.org/<?php echo $_GET['fl']; ?>" }
      
      
      
  </script>
 <body onload="<?php if (isset($_GET['fl'])) {
     $extension = explode(".", $_GET['fl']);
     $extt = end($extension);
     if($extt!="doc" && $extt!="docx" && $extt!="pdf" && $extt!="xls" && $extt!="xlsx" && $extt!="pptx")
     echo "cargar()";
 } ?>">
     <div>Si no visualiza el archivo de clic <span style='cursor:pointer;color: blue; text-decoration:underline;' onclick="location.href='https://neo.cpcoriente.org/<?php echo $_GET['fl']; ?>'">aqui</span></div>
    <div id="file"> 
<iframe   src="https://docs.google.com/gview?url=https://neo.cpcoriente.org/<?php echo $_GET['fl']; ?>&embedded=true" style=" width:100%; height:100%;" frameborder="0"></iframe>
</div>
</body>

<?php } else { ?>
<script>

    
 location.href='index.php'   
    

</script>
<?php }
?>
