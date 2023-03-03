<!DOCTYPE html>
<html>
<head>
    <title>Innoraft Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<style>

/* style sheet for the html */

    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .service{
        display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 1100px;
    align-items: center;
    margin: 30px auto;
    position: relative;
}
    .service-title {
    color: #ff7900;
    font-size: 3rem;
    line-height: 1.4;
    text-transform: uppercase;
    font-family: "ss-bold" 
}
.service-secondary-title{
    color: #4b5561;
    font-size: 3rem;
    line-height: 1.4;
    text-transform: uppercase;
    font-family: "ss-bold"

}

.service-rv--content .service-list ul li {
    font-family: 'ss-semibold';
    list-style: none;
    position: relative;
    padding-left: 24px;
    margin: 0 0 20px;
    line-height: 1.4;}

    .service-rv--content .service-list ul li:before {
    content: "";
    width: 16px;
    height: 16px;
    border: 2px solid #ff7900;
    position: absolute;
    left: 0;
    border-radius: 50%;
    top: 3px;
}
ul {
    padding-left: 0px;
}

.service-rv--content .service-list ul li a {
    text-decoration: none;
    color: #4b5561;
}
.btn {
    border: 2px solid orange;
    color: #333;
    padding: 8px 20px;
    border-radius: 4px;
}
.service-rv--content a {
    text-decoration: none;
}
.icon img{
    display: inline-block;
    width: auto;
    height: 60px;
    margin: 5px 20px 5px 0;
}

    </style>
<body>
    <?php include("services.php");?>
    <div class="container">
            
            <?php 
        $i=0;
        //this loop to print data in alternate ways in html for even  
        foreach ($services as $service): 
            if($i%2 == 0){
        ?>
            <div class="service">
            <div class="service-rv--content">
                <div> <?php echo $service->fieldsecondary; ?> </div>

                <div class="icon">

                <!-- this loop prints the logos  -->
                <?php foreach ($service->icons as $icon) {?>
                    
                    <img src="https://ir-dev-d9.innoraft-sites.com<?php echo $icon; ?> "alt="">
                <?php }
                ?>    
                </div>
            
                <div class="service-list"><ul>
                    <?php echo $service->fieldservice; ?>
                </div>
                <div class="cta-link"><a class="btn" href="">Explore More</a></div>
            
            </div>
            <div>
            <img src="https://ir-dev-d9.innoraft-sites.com<?php echo $service->image_url; ?>" alt="">
            </div>
        </div>

        <?php 
        }
        else
        { ?>

<div class="service">
<div>
            <img src="https://ir-dev-d9.innoraft-sites.com<?php echo $service->image_url; ?>" alt="">
            </div>
            <div class="service-rv--content">
                <div> <?php echo $service->fieldsecondary; ?> </div>
            
                <div class="icon">
                    <!-- this loop prints icons -->
                <?php foreach ($service->icons as $icon) {?>
                    
                    <img src="https://ir-dev-d9.innoraft-sites.com<?php echo $icon; ?> "alt="">
                <?php }
                ?>    
                </div>

                <div class="service-list"><ul>
                    <?php echo $service->fieldservice; ?>
                </div>
            
                <div class="cta-link"><a class="btn" href="">Explore More</a></div>
            </div>
        
        </div>


        <?php 
        }
        $i++;
    endforeach; ?>
    </div>
</body>
</html>