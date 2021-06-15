function hideWidget() {
    var widget = document.getElementById("widget-contact");
    var button = document.getElementById("widget-button");
    widget.classList.toggle("hideWidget");
    button.classList.toggle("hideWidget");
    //$("#open-button").toggle("close-widget");
    
  }


  async function orionRequest(){
    try{
      //if(aborter) aborter.abort();
      var selected = $("#country").find('option:selected');
       var extra = selected.data('country-code'); 
      // make our request cancellable
      aborter = new AbortController();
      const signal = aborter.signal;
      const bodyFromText = JSON.stringify({
        name: $("#name").val(),
        surname: $("#lastname").val(),
        email:$("#email").val(),
        phone: $("#phone").val(),
        from: $("#siteId").val(),
        country: extra,
    });

    console.log(bodyFromText);
    const response = await fetch('/wp-json/devtzal/widget/v1/contact',{
      method: 'POST',
      signal:signal,
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
      body: bodyFromText
      });
      const rq = await response.json();
      //aborter = null;
      console.log(rq);
      $("#alert-msg-success").show();
      $("#alert-msg-error").hide();
      return  rq; 
   

    }
    catch(error){

        console.log(error);
        $("#alert-msg-error").show();
        $("#alert-msg-success").hide();
    }
  }
  
  $(document).ready(function () {
    $("#widget-devtzal-form").submit(function (event) {

     /*  const bodyFromText = JSON.stringify({
        name: $("#name").val(),
        surname: $("#lastname").val(),
        email:"test@email.com",
        phone: $("#phone").val(),
        from: $("#siteId").val(),
    })
 */
     /*  var formData = {
        name: $("#name").val(),
        surname: $("#lastname").val(),
        email:"test@email.com",
        phone: $("#phone").val(),
        from: $("#siteId").val(),
        comentarios: "WIDGET",
        origen:2,
        lang:"es",
        country_iso: "MX"
        
      }; */

   /*    const response = await fetch('/wp-json/devtzal/widget/v1/contact',{
        method: 'POST',
        signal:signal,
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
        body: bodyFromText 
    }
    );
    await response.json();
    aborter = null;
     */
      
     /*  console.log(formData);
      $.ajax({
        
        url: '/wp-json/devtzal/widget/v1/contact',
        type: 'POST',
        accepts: "application/json",
        data: formData,
        crossDomain: true,
        headers:{
          'Access-Control-Allow-Origin' : '*',
          "Accept": "application/json",
        },
        success: function (result){
          console.log(result)
        },
        error: function (e){
          console.log(e);
        }
       
        
      }); */
  
      event.preventDefault();
      orionRequest();
    });
  });
    
  
