[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/pagman/bannner.png)](ttps://www.linkedin.com/in/stephendev)

# Pagman Theme Development 👋.

#### Using default pagman bootstrap menu items blade file.

```php
<header id="header">

    <div id="navbarWrapper" class="navbar-wrapper">
        <nav class="navbar navbar-expand-lg bg-white navbar-default" id="navbarDefault">
        
          <!-- Container -->
          <div class="container">

            <!-- //Navbar brand -->
            <a href="" class="navbar-brand">Sample</a>
  
            <!-- Navbar toggler button-->
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
              <i class="fa fa-bars ml-1"></i>
            </button>
  
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
             <!-- Including pagman bootstrap menuitems -->
              @include('pagman::web.menu.bootstrapmenuitems')
            </div>
  
          </div>

        </nav>
    </div>
            
</header>
```

