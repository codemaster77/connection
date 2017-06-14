<?php
//lifetime langer maken voor session zodat als men browser sluiten ze nog actief zijn
$expire = 365*24*3600; 

ini_set('session.gc_maxlifetime', $expire);

session_start();  

setcookie(session_name(),session_id(),time()+$expire);
include_once 'config/ProjectDb.php';

if(isset($_GET['ID'])){
    $pid = $_GET['ID'];
}

?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AllAroundStore</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/slideshow.css" type="text/css">
        
    </head>
    <body class="body">
        <header class="mainheader">
            
        </header>
        
            <article class="topcontent">
            <header>
                
            </header>
            
            
                
            </article>
        <?php
        $limit = 3;
            if (isset($_GET["page"]))
            {
                $page = $_GET["page"];
            }
            else{
                $page = 1;
            }
        $start_from = ($page-1) * $limit;
        ?>
        
        
			<div id="wrapper"> 
            <div 
	class="test"
	data-slides='[
		"images/Project1/beer.jpg",
		"images/Project1/beer2.jpg",
		"images/Project1/beer3.jpg"
	]'
>  
                
               
                
            <table>
            <thead>
                    <tr>
                        <td>ProjectID</td>
                        <td>ProjectTitle</td>
                        <td>ProjectSubTitle</td>
                        <td>ProjectThumbnail</td>
                        <td>ProjectFoto</td>
                    </tr>
            </thead>
            <tbody id='categorieData'>
                <!-- Hier toont men alle producten per categorie dat men geselecteerd heeft. Als men "ALL" selecteerd dan toont men alle producten. Men maakt hier gebruik van ProductDb klasse om resultaat te tonen. Men steekt dit resultaat in detailproduct. -->
            <?php
           
            foreach (ProjectDb::getById($pid) as $detailProject) {
                
                ?>
            <tr >
                <!-- data label gebruik ik voor in mijn css mijn pagina responsive te maken. -->
                <!-- in detailProduct zit een array met data van bestelling database. -->
                <td data-label ="Foto"><img src="<?php echo $detailProject['foto_path']; ?>" alt="Product" class="image" height="100" width="100"/>
                </td> 
               
                <td data-label ="ProjectTitle"><?php echo $detailProject['Titel']; ?></td>
                <td data-label ="ProjectSubTitle"><?php echo $detailProject['Subtitel']; ?></td>
                <td data-label ="ProjectThumbnail"><?php echo $detailProject['foto']; ?></td>
                <td><a href="projectdetail.php?ID=<?php echo $detailProject['ID'] ?>">Detail</a></td>
               </tr>
                <?php
            }
            ?>
            </tbody>
            </table>
                </div>
                
			
            
            
   
        </div>
       
           
               
    </body>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/slideshow.js"></script>    
</html>


