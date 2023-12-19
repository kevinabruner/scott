<?php
    $menuChoice = 'Words';    
    include 'header.php';     
    include 'files.php';     
?>

    <script>
        $(document).ready(function() {
            $('#trigger').click(function(){
                $("#dialog").dialog();
            }); 
            $('.chapter').click(function (event) {
                $('.chapter').not(this).removeAttr("open");  
            }); 		
        });   	
        document.addEventListener('play', function(e){
            var audios = document.getElementsByTagName('audio');
            for(var i = 0, len = audios.length; i < len;i++){
                if(audios[i] != e.target){
                    audios[i].pause();
                }
            }
        }, true);
    </script>
    <div class="content-container">
        <div class="sounds-section">            
            <div class="section-item">
                <h3>Article: Using Drumbeats to Theorize Meter in Quintuple and Septuple Grooves</h3>
                <br />
                <p><strong><a target="_blank" href="https://academic.oup.com/mts/article/42/2/227/5846226?guestAccessKey=7f0d7a88-3bc0-40eb-a450-64ee7e0e73b8"><i class="fa fa-link" aria-hidden="true"></i> Using Drumbeats to Theorize Meter in Quintuple and Septuple Grooves </a></strong></p>
                <p>This article explores how drummers play music in five- and seven-count grooves. The article is published in <em>Music Theory Spectrum</em>.</p>
            </div>
            <div class="section-item">
                <h3>Dissertation</h3>
                <br />
                <p><strong><a id="trigger" download href="Hanenberg_Scott_201811_PhD_Thesis.pdf" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Unpopular Meters: Irregular Grooves and Drumbeats in the Songs of Tori Amos, Radiohead, and Tool </a></strong></p>
                <p>This is my PhD dissertation (University or Toronto). It's about how listening to the drum kit can help us understand complicated meters in rock music.</p>
                <details style="border: 1px solid #eee; border-radius:5px;padding:15px;">
                    <summary>
                        <i class="fa fa-volume-up" style="margin-right:10px;" aria-hidden="true"></i>Audio samples reffered to in thesis
                    </summary>
                    <hr />                                                             
					<?php
						$dir    = 'audio';
						$chapNum = 0;
						$index = 0;
						foreach ($soundSamples as $value){
							if ($chapNum != $value['chapter']){
								if ($chapNum != 0){echo '</details>';}
								echo '<details class="chapter"><summary>Chapter ' . $value['chapter'] . '</summary>';
								$chapNum = $value['chapter'];
							}
							?>
								<p><strong><?php echo  $value['trackName']; ?></strong></p>                    
								<audio preload="none" controls src="audio/<?php echo rawurlencode($value['filename']); ?>">Your browser does not support the <code>audio</code> element.</audio>
								<hr />        
							<?php 
							if ($chapNum != $value['chapter']){
								echo '</details>';
							}
							$index++;
						}           
                        echo '</details>';
					?>              
                </details>
            </div>
            <div class="section-item">
                <h3>Article: Rock Modulation and Narrative</h3>
                <br />
                <p><strong><a target="_blank" href="http://mtosmt.org/issues/mto.16.22.2/mto.16.22.2.hanenberg.html"><i class="fa fa-link" aria-hidden="true"></i> Rock Modulation and Narrative </a></strong></p>
                <p>My first published article summarizes research from my masters thesis (University of Toronto). In this article, I explore the connection between key changes and narrative in rock music.</p>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
