<?php
// TEMPLATE NAME: 说说心情
if (!islogin()) {
    header("Location: " . get_bloginfo('url'));
    exit();
}
global $set;
?>
<?php
the_post();
?>
<!doctype html>
<html lang="zh">
<head>
<?php get_header(); ?>
<style type="text/css">
/** 垂直时间线CSS样式 */

.cbp_tmtimeline {
    margin: 30px 0 0 0;
    padding: 0;
    list-style: none;
    position: relative;
} 
/* The line */
.cbp_tmtimeline:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 10px;
    background: #afdcf8;
    left: 20%;
    margin-left: -6px;
}
/* The date/time */
.cbp_tmtimeline > li .cbp_tmtime {
    display: block;
    width: 30%;
    padding-right: 100px;
    position: absolute;
    color: #AAA;
}
.cbp_tmtimeline > li .cbp_tmtime span {
    display: block;
    text-align: right;
}
.cbp_tmtimeline > li .cbp_tmtime span:first-child {
    font-size: 0.9em;
    color: #bdd0db;
}
.cbp_tmtimeline > li .cbp_tmtime span:last-child {
    font-size: 2.9em;
    color: #24a0f0;
}
.cbp_tmtimeline > li:nth-child(odd) .cbp_tmtime span:last-child {
    color: #7878f0;
}
/* Right content */
.cbp_tmtimeline > li .cbp_tmlabel {
    margin: 0 0 15px 25%;
    background: #24a0f0;
    color: #fff;
    padding: 0.8em;
    font-size: 1.2em;
    font-weight: 300;
    line-height: 1.4;
    position: relative;
    border-radius: 5px;
}
.cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel {
    background: #7878f0;
}
.cbp_tmtimeline > li .cbp_tmlabel h2 { 
    border-bottom: 0px;
    border-top:1px dashed #FFF; 
    font-size:16px; 
    height: 24px; 
    padding: 5px 3px 12px; 
    margin:0px;
}
.cbp_tmtimeline > li .cbp_tmlabel h2 > span { 
    font-size: 12px; 
    float: right; 
    text-align: center; 
    line-height: 24px; 
    overflow: hidden; 
    text-overflow: ellipsis; 
    white-space: nowrap;
}
/* The triangle */
.cbp_tmtimeline > li .cbp_tmlabel:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-right-color: #24a0f0;
    border-width: 10px;
    top: 10px;
}
.cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel:after {
    border-right-color: #7878f0;
}
/* The icons */
.cbp_tmtimeline > li .cbp_tmicon {
    width: 48px;
    height: 48px;
    font-family: 'ecoico';
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    font-size: 48px;
    line-height: 48px;
    -webkit-font-smoothing: antialiased;
    position: relative;
    color: #fff;
    background: #46a4da;
    border-radius: 50%;
    box-shadow: 0 0 0 8px #afdcf8;
    text-align: center;
    left: 20%;
    top: 0;
    margin: 0 0 0 -25px;
}
.cbp_tmtimeline > li .cbp_tmicon >img {
    border-radius: 50%; 
    position: absolute; 
    top: 0px; 
    left: 0px;
}
/* Example Media Queries */
@media screen and (max-width: 65.375em) {
    .cbp_tmtimeline > li .cbp_tmtime span:last-child {
        font-size: 1.5em;
    }
}
@media screen and (max-width: 47.2em) {
    .cbp_tmtimeline:before {
        display: none;
    }
    .cbp_tmtimeline > li .cbp_tmtime {
        width: 100%;
        position: relative;
        padding: 0 0 20px 0;
    }
    .cbp_tmtimeline > li .cbp_tmtime span {
        text-align: left;
    }
    .cbp_tmtimeline > li .cbp_tmlabel {
        margin: 0 0 30px 0;
        padding: 1em;
        font-weight: 400;
        font-size: 95%;
    }
    .cbp_tmtimeline > li .cbp_tmlabel:after {
        right: auto;
        left: 20px;
        border-right-color: transparent;
        border-bottom-color: #24a0f0;
        top: -20px;
    }
    .cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel:after {
        border-right-color: transparent;
        border-bottom-color: #7878f0;
    }
    .cbp_tmtimeline > li .cbp_tmicon {
        position: relative;
        float: right;
        left: auto;
        margin: -55px 5px 0 0px;
    }
}
</style>
</head>
<body>
<?php get_template_part('component/body-top'); ?>
        <header>
            <div class="header-main container">
                <?php
                get_template_part('component/nav-header');
                ?>
            </div>
        </header>
<div class="top-divider"></div>
<section class="container">
<div class="content-wrap">
<div class="content">
	<div style="background: #FFF; padding: 30px; border-radius: 5px;">
		<ul class="cbp_tmtimeline">
			<?php 
			query_posts("post_type=shuoshuo & post_status=publish & posts_per_page=-1");
			if ( have_posts() ) { 
				while ( have_posts() ) { 
					the_post(); ?>
					<li>
						<time class="cbp_tmtime"><i class="fa fa-clock-o"></i>    <?php the_time('Y年n月j日G:i:s'); ?></time>
						<div class="cbp_tmicon">
							<img src="图像链接" class="avatar avatar-48" width="48" height="48">

						</div>
						<div class="cbp_tmlabel" >
							<span style="font-size:14px;"><?php the_content(); ?></span>
							<h2><?php the_title(); ?></h2>
						</div>
					</li>
				<?php }
			} ?>
		</ul>
	</div>
</div>	
</div>
</section>

    <footer>
        <?php get_footer(); ?>
    </footer>
</div>
</body>
</html>
