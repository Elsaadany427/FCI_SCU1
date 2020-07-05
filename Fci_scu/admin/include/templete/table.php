<?php ?>

<span style="float:right"><button id="but_add" class="btn btn-danger">Add New Row</button></span>

</div>
</div>
</div>
</div>
</div>
</main>
</div>
</body>

<script>
$(function() {

$('#makeEditable').SetEditable({ $addButton: $('#but_add')});

$('#submit_data').on('click',function() {
var td = TableToCSV('makeEditable', ',');
console.log(td);
var ar_lines = td.split("\n");
var each_data_value = [];
for(i=0;i<ar_lines.length;i++)
{
each_data_value[i] = ar_lines[i].split(",");
}

for(i=0;i<each_data_value.length;i++)
{
if(each_data_value[i]>1)
{
console.log(each_data_value[i][2]);
console.log(each_data_value[i].length);
}

}

});
});

</script>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>
<!-- <script src="layout/js/lecturetable.js"></script> -->
</html>
