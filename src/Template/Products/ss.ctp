<div id="progressbar"></div>
<script>
  $("#progressbar").kendoProgressBar({
    change: change
  });

  function change(e) {
    switch(true){
      case (e.value<=25):
        this.progressWrapper.css({"background-color": "#e32424", "border-color": "#e32424"});
        break;

      case (e.value>25 && e.value<=50):
        this.progressWrapper.css({"background-color": "#e68e1c", "border-color": "#e68e1c"});
        break;

      case (e.value>51 && e.value<=75):
        this.progressWrapper.css({"background-color": "#e6dc1c", "border-color": "#e6dc1c"});
        break;

      case (e.value>76 && e.value<=100):
        this.progressWrapper.css({"background-color": "#32c728", "border-color": "#32c728"});
        break;
    }
  }


  $(document).ready(function() {
   var x = 1;
   while(x<=100){
    x+=1;
    $("#progressbar").data("kendoProgressBar").value(x); 
   }
  });  
</script>