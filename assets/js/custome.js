
  $( function() {
    $( "#farm_registration_datepicker" ).datepicker();
  } );

  function suspend_user_id(user_id) {
   
    if (confirm('Are you sure you want to suspend this?')) {
      
          $.ajax({
              url: base_url+'admin/suspend_user_id',
              type: "POST",
              data: {
                  user_id:user_id
              },
              success: function (data) {
                  var response = JSON.parse(data)
                  
                  if(response.status == 'success')
                  {
                      $('#suspend_div').show();
                      
                      setTimeout(function(){ location.reload(); }, 2000);
                  }
                  
              }
          });
      }
  }
  
  function delete_user_id(user_id) {
      
    if (confirm('Are you sure you want to delete this?')) {
      
          $.ajax({
              url: base_url+'admin/delete_user_id',
              type: "POST",
              data: {
                  user_id:user_id
              },
              success: function (data) {
                  var response = JSON.parse(data)
                  
                  if(response.status == 'success')
                  {
                      $('#delete_div').show();
                      setTimeout(function(){ location.reload(); }, 2000);
                  }
                 
              }
          });
      }
  }
  
  function active_suspend_user_id(user_id) {
      
    if (confirm('Are you sure you want to Active this?')) {
      
          $.ajax({
              url: base_url+'admin/active_suspend_user_id',
              type: "POST",
              data: {
                  user_id:user_id
              },
              success: function (data) {
                  
                  var response = JSON.parse(data)
                  
                  if(response.status == 'success')
                  {
                      $('#result').show();
                      setTimeout(function(){ location.reload(); }, 2000);
                  }
                  
              }
          });
      }
  }