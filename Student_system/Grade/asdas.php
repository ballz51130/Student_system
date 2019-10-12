



<select id="list" onchange="getSelectValue();">
	
			<?php
			$strSQL = "SELECT * FROM `edit_grade` ORDER BY `edit_grade`.`G_code` ASC ";
			$objQuery = $conn->query($strSQL);
      while($objResuut = $objQuery->FETCH_ASSOC())
			{
			?>
			<option value="<?php echo $objResuut["G_code"];?>"><?php echo " A ".$objResuut["A"];?></option>
			<?php
			}
			?>
      </select>
      <script>
        
        function getSelectValue()
        {
            var selectedValue = document.getElementById("list").value;
            console.log(selectedValue);
            selectedValue =$sss;
        }
        getSelectValue();
         

    </script>

        <?php
        echo $sss;
         $sqlgradeED = "SELECT * FROM `edit_grade` 
         WHERE G_code  = " ;
$querygradeED = $conn->query($sqlgradeED);
$resultgradeED = $querygradeED->FETCH_ASSOC();
echo $resultgradeED['A'];
        ?>