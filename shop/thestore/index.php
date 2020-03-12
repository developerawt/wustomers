<!DOCTYPE html>
<html>
  <head>
    <title>Apple Pie</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FF9800">
    <link rel="manifest" href="/shop/thestore/manifest.json">
    <link rel="stylesheet" href="https://unpkg.com/@material/toolbar@0.35.0/dist/mdc.toolbar.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@material/elevation@0.35.0/dist/mdc.elevation.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@material/button@0.35.0/dist/mdc.button.min.css">
    <style>
      body {
        margin: 0;
        background-color: #FFF;
      }
      
      .mdc-toolbar {
        background-color: #FF9800;
      }
      
      content div {
        margin: 24px;
        padding: 24px;
        max-width: 512px;
      }
      
      .content {
        background-color: #fff;
      }
    </style>
  </head>
 
   <body>
    <header class="mdc-toolbar">
      <div class="mdc-toolbar__row">
        <section class="mdc-toolbar__section mdc-toolbar__section--align-start">
          <span class="mdc-toolbar__title">Apple Pie</span>
        </section>
      </div>
    </header>

    <content>
      <div class="content mdc-elevation--z1">
        Apple Pie has it's own manifest and it's own service worker.
      </div>

      <div>
        <a class="mdc-button" href="/">Kitchen</a>
      </div>
    </content>
 
    <script>
       <?php 
       $shop_name = 'aaa';

       ?>

      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/shop/<?php echo "s" ;?>/service-worker.js', { scope: './' }).then(function(registration) {
          console.log('Service worker registration succeeded:', registration);
        }).catch(function(error) {
          console.log('Service worker registration failed:', error);
        });
      } else {
        console.log('Service workers are not supported.');
      }
    </script>
  </body>
</html>
