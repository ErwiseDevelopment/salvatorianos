<?php

function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

show_admin_bar(false);

register_nav_menus(array(
    'primary' => 'Menu Primário',
));

function dd($var)
{
    var_dump($var);
    die();
}

function get_file_uri(string $path)
{
    return get_template_directory_uri() . '/' . $path;
}

function get_theme_file(string $path)
{
    return get_template_directory() . '/' . $path;
}

function register_assets(string $handle, string $src, $in_footer = false)
{
    $id = false;

    if (file_exists(get_theme_file('mix-manifest.json'))) {
        $contents = file_get_contents(get_theme_file('mix-manifest.json'));

        $key = '/' . $src;

        if (str_contains($contents, $src)) {
            $manifest = json_decode($contents);
            if (str_contains($manifest->$key, '?id')) {
                $id = explode('?id=', $manifest->$key)[1];
            }
        }
    }

    if (str_contains($src, '.css')) {
        wp_enqueue_style($handle, get_file_uri($src), array(), $id);
    }

    if (str_contains($src, '.js')) {
        wp_enqueue_script($handle, get_file_uri($src), array(), $id, $in_footer);
    }
}

function get_sanitize_string($str)
{
    $str = trim($str);
    $str = str_replace(array('.', '-', '/', ' '), "", $str);

    return $str;
}

function get_limit_words($string, $word_limit)
{
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
        array_push($words, "...");
    }
    return implode(' ', $words);
}

function get_months($abbr = true)
{
    if ($abbr) {
        return [
            '01' => 'Jan',
            '02' => 'Fev',
            '03' => 'Mar',
            '04' => 'Abr',
            '05' => 'Mai',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Ago',
            '09' => 'Set',
            '10' => 'Out',
            '11' => 'Nov',
            '12' => 'Dez'
        ];
    }

    return [
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    ];
}

function get_month($month)
{
    return get_months()[$month];
}

function get_editorials_categories_setting(): array
{
    return [
        'editoria-educacao' => [
            'title' => 'Educação',
            'color' => '#048F35'
        ],
        'editoria-institucional' => [
            'title' => 'Institucional',
            'color' => '#1B9333'
        ],
        'editoria-obras-sociais' => [
            'title' => 'Obras Sociais',
            'color' => '#389731'
        ],
        'editoria-paroquias' => [
            'title' => 'Paróquias',
            'color' => '#4E9B2E'
        ],
        'editoria-pe-jordan' => [
            'title' => 'Pe. Joradan',
            'color' => '#63A02B'
        ],
        'editoria-portal' => [
            'title' => 'Portal',
            'color' => '#72A625'
        ],
        'editoria-revistas' => [
            'title' => 'Revistas',
            'color' => '#72A625'
        ],
        'editoria-vocacional' => [
            'title' => 'Vocacional',
            'color' => '#83AB1E'
        ]
    ];
}

function get_categories_setting()
{
    return [
        'categories' => [
            'blog' => [
                'title' => 'Blog',
                'slug'  => 'blog'
            ],
            'featured' => [
                'title' => 'Destaque',
                'slug'  => 'destaque'
            ],
            'news' => [
                'title' => 'Notícia',
                'slug'  => 'noticia'
            ]
        ],
        'editorials' => [
            'educacao' => [
                'title'   => 'Educação',
                'name'    => 'educacao',
                'slug'    => 'educacao',
            ],
            'institucional' => [
                'title'   => 'Institucional',
                'name'    => 'institucional',
                'slug'    => 'institucional',
            ],
            'obras-sociais' => [
                'title' => 'Obras Sociais',
                'name'  => 'obras-sociais',
                'slug'  => 'obras-sociais',
            ],
            'paroquias' => [
                'title' => 'Paróquias',
                'name'  => 'paroquias',
                'slug'  => 'paroquias',
            ],
            'pe-jordan' => [
                'title' => 'Pe. Jordan',
                'name'  => 'pe-jordan',
                'slug'  => 'pe-jordan',
            ],
            'portal' => [
                'title' => 'Portal',
                'name'  => 'portal',
                'slug' => 'portal',
            ],
            'revistas' => [
                'title'       => 'Revistas',
                'name'        => 'revistas',
                'single_name' => 'revista',
                'slug'        => 'revistas',
            ],
            'vocacional' => [
                'title' => 'Vocacional',
                'name'  => 'vocacional',
                'slug'  => 'vocacional',
            ],
        ]
    ];
}

function get_editorials(): array
{
    return [
        'educacao' => [
            'categories' => [
                'blog'    => 'educacao-blog',
                'news'    => 'educacao-noticia',
                'slug'    => 'educacao',
                'pattern' => 'editoria-educacao'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Educação'
        ],
        'institucional' => [
            'categories' => [
                'blog'    => 'institucional-blog',
                'news'    => 'institucional-noticia',
                'slug'    => 'institucional',
                'pattern' => 'editoria-institucional'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Institucional'
        ],
        'obras-sociais' => [
            'categories' => [
                'blog' => 'obras-sociais-blog',
                'news' => 'obras-sociais-noticia',
                'slug' => 'obras-sociais',
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Obras Sociais'
        ],
        'paroquias' => [
            'categories' => [
                'blog'    => 'paroquias-blog',
                'news'    => 'paroquias-noticia',
                'slug'    => 'paroquias',
                'pattern' => 'editoria-paroquias'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Paróquias'
        ],
        'pe-jordan' => [
            'categories' => [
                'blog'    => 'pe-jordan-blog',
                'news'    => 'pe-jordan-noticia',
                'slug'    => 'pe-jordan',
                'pattern' => 'editoria-pe-jordan'
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Pe. Jordan'
        ],
        'portal' => [
            'categories' => [
                'blog'          => 'portal-blog',
                'blog_featured' => 'portal-blog-destaque',
                'news'          => 'portal-noticia',
                'news_featured' => 'portal-noticia-destaque',
                'slug'          => 'portal',
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Pe. Jordan'
        ],
        'revistas' => [
            'categories' => [
                'blog' => 'revistas-blog',
                'news' => 'revistas-noticia',
                'slug' => 'revistas',
            ],
            'colors' => [
                'primary'   => '#000000',
                'secondary' => '#000000'
            ],
            'title' => 'Revistas'
        ],
        'vocacional' => [
            'categories' => [
                'blog'    => 'vocacional-blog',
                'news'    => 'vocacional-noticia',
                'slug'    => 'vocacional',
                'pattern' => 'editoria-vocacional'
            ],
            'colors' => [
                'primary'   => '#ffd000',
                'secondary' => '#ffa300'
            ],
            'title' => 'Vocacional'
        ],
    ];
}

function get_format_date(string $date)
{
    list($day, $month, $year) = explode('/', $date);

    $month = get_months(false)[$month];

    return $day . ' de ' . $month . ' de ' . $year;
}

/**
 * 
 * Functions Single Post
 */

function get_single_post_setting(): array
{
    return [
        'blog' => [
            'banner_title' => 'Blog',
            'button_title' => 'Todos os blogs',
            'button_link'  => get_home_url(null, '/blog')
        ],

        'noticia' => [
            'banner_title' => 'Notícias',
            'button_title' => 'Todas as notícias',
            'button_link'  => get_home_url(null, '/noticias')
        ],
    ];
}

function get_single_post_editorial()
{
    $post_categories = get_the_category(get_the_ID());

    foreach ($post_categories as $post_category) {
        foreach (get_categories_setting()['editorials'] as $editorial) {
            if ($post_category->slug == $editorial['slug']) {
                return $post_category;
            }
        }
    }
}

function get_single_post_category()
{
    $post_categories = get_the_category(get_the_ID());

    $categories_main = [
        'blog',
        'noticia'
    ];

    foreach ($post_categories as $post_category) {
        foreach ($categories_main as $category_main) {
            if ($post_category->slug == $category_main) {
                return $post_category;
            }
        }
    }
}

function get_single_post_categories(): array
{
    $categories = [];

    array_push($categories, get_single_post_category());

    array_push($categories, get_single_post_editorial());

    return $categories;
}

function show_banner_title(object $page): bool
{
    if (isset(get_editorials()[$page->post_name]))
        return false;

    return true;
}

function get_hidden_banner_title(string $type, string $page = null): bool
{
    $pages = [
        'page' => [
            'inicio'        => 'Início',
            'institucional' => 'Institucional',
            'pe-jordan'     => 'Pe. Jordan',
            'vocacional'    => 'Vocacional',
            'paroquias'     => 'Paróquias',
            'educacao'      => 'Educação',
            'obras-sociais' => 'Obras Sociais',
            'revistas'      => 'Revista'
        ]
    ];

    if ($type == 'post') {
        return true;
    }

    if ($type == 'page') {
        if (isset($pages[$type][$page])) {
            return false;
        }
    }

    return true;
}

function get_custom_query(int $posts_per_page = -1, string $post_type = 'post', string $cat_name = '', string $order = 'DESC', array $post__not_in = [])
{
    if ($cat_name != '') {
        return [
            'posts_per_page' => $posts_per_page,
            'post_type'      => $post_type,
            'category_name'  => $cat_name,
            'order'          => $order,
            'post__not_in'   => $post__not_in
        ];
    }

    return [
        'posts_per_page' => $posts_per_page,
        'post_type'      => $post_type,
        'order'          => $order,
        'post__not_in'   => $post__not_in
    ];
}

function get_post_thumbnail_empty_custom(): string
{
    return '<div class="w-full h-full bg-gray-100"></div>';
}

function get_post_thumbnail_custom(string $classe = '')
{
    if (!empty(get_post_thumbnail_empty_custom())) {
        return get_post_thumbnail_empty_custom();
    }

    $alt = get_the_title() . ' - Salvatorianos';

    the_post_thumbnail('post-thumbnail', array(
        'class' => $classe,
        'alt'   => $alt
    ));
}

function get_query_custom(string $post_type, string $editorial, int $posts_per_page = -1): array
{
    return array(
        'posts_per_page' => $posts_per_page,
        'post_type'      => $post_type,
        'tax_query'      => array(
            array(
                'taxonomy' => 'editoria',
                'field'    => 'slug',
                'terms'    => array($editorial)
            )
        )
    );
}

function get_general_news_editorial_setting(string $title, string $category_slug, string $button_title, string $button_link): array
{
    $news_category_slug = get_categories_setting()['categories']['news']['slug'];

    $news_category = get_category_by_slug($news_category_slug);

    $editorial_category = get_category_by_slug($category_slug);

    return [
        'title'              => $title,
        'news_category'      => $news_category,
        'editorial_category' => $editorial_category,
        'button_title'       => $button_title,
        'button_link'        => get_home_url(null, $button_link)
    ];
}


function get_general_banner_title_setting($post): array
{
    if ($post->post_type == 'post') {
        $title = get_single_post_category()->slug == 'blog' ? 'Blog' : 'Notícia';
        $classe = 'banner-post';
    } else {
        $title = get_the_title();
        $classe = 'banner-page';
    }

    return [
        'title' => $title,
        'class' => $classe
    ];
}

function get_general_blog_setting(string $editorial_category_slug, string $filter = ''): array
{
    $blog_category_id = get_category_by_slug('blog')->term_id;

    $editorial_category_id = get_category_by_slug($editorial_category_slug)->term_id;

    if (!empty($filter)) {
        $filter = '?categoria=' . $filter;

        return [
            'blog_category_id'      => $blog_category_id,
            'editorial_category_id' => $editorial_category_id,
            'filter'                => $filter
        ];
    }

    $filter = 'blog';

    return [
        'blog_category_id'      => $blog_category_id,
        'editorial_category_id' => $editorial_category_id,
        'filter'                => $filter
    ];
}

function get_new_item_setting(bool $show_details = true): array
{
    $excerpt = null;

    $category_name = null;

    if ($show_details) {
        foreach (get_the_category(get_the_ID()) as $category) {
            foreach (get_editorials_categories_setting() as $slug => $title) {
                if ($category->slug == $slug) {
                    $category_name = $category->name;
                }
            }
        }
    } else {

        foreach (get_the_category(get_the_ID()) as $category) {
            foreach (get_editorials() as $editorial) {
                if ($category->name == $editorial) {
                    $category_name = $category->name;
                }
            }
        }
    }

    $thumbnail = get_the_post_thumbnail(null, 'post-thumbnail', array('class' => 'w-full h-[220px] object-cover', 'alt' => get_the_title()));

    if (!empty(get_the_excerpt())) {
        $excerpt = get_the_excerpt();
    } else {
        $excerpt = get_limit_words(get_the_content(), 20);
    }

    return [
        'title'          => get_the_title(),
        'category_name'  => $category_name,
        'date_published' => get_the_date('d/m/Y'),
        'content'        => get_the_content(),
        'excerpt'        => $excerpt,
        'thumbnail'      => $thumbnail,
        'link'           => get_the_permalink()
    ];
}

function get_pages_editorials_settings()
{
    return [
        'institucional' => [
            'header_background' => true,
            'menu'              => 'menu-institucional'
        ],

        'pe-jordan' => [
            'header_background' => true,
            'menu'              => 'menu-pe-jordan'
        ],

        'vocacional' => [
            'header_background' => true,
            'menu'              => 'menu-vocacional'
        ],

        'paroquias' => [
            'header_background' => true,
            'menu'              => 'menu-paroquias'
        ],

        'educacao' => [
            'header_background' => true,
            'menu'              => 'menu-educacao'
        ],

        'obras-sociais' => [
            'header_background' => true,
            'menu'              => 'menu-obras-sociais'
        ],

        'revista' => [
            'header_background' => true,
            'menu'              => 'menu-revista'
        ],
    ];
}

register_nav_menus(array(
    'primary'            => __('Primary Menu', 'yourtheme'),
    'menu-institucional' => __('Menu Institucional', 'yourtheme'),
    'menu-pe-jordan'     => __('Menu Pe. Jordan', 'yourtheme'),
    'menu-vocacional'    => __('Menu Vocacional', 'yourtheme'),
    'menu-paroquias'     => __('Menu Paróquias', 'yourtheme'),
    'menu-educacao'      => __('Menu Educação', 'yourtheme'),
    'menu-obras-sociais' => __('Menu Obras Sociais', 'yourtheme'),
    'menu-revista'       => __('Menu Revista', 'yourtheme'),
));

/**
 * Enqueue scripts and styles.
 */
function theme_dev_scripts()
{
    wp_enqueue_style('theme-dev-style', get_stylesheet_uri());

    register_assets('theme-dev-fonts-style', 'public/fonts/fonts.css');
    register_assets('theme-dev-app-style', 'public/css/app.css');
    register_assets('theme-dev-app-scripts', 'public/js/app.js', true);

    wp_enqueue_style('theme-dev-custom-style', get_template_directory_uri() . '/custom.css', array(), '1.0.0');
    wp_enqueue_script('theme-dev-custom-scripts', get_template_directory_uri() . '/custom.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'theme_dev_scripts');

require get_template_directory() . '/inc/functions/register-post-types.php';
require get_template_directory() . '/inc/functions/register-rest-fields.php';
require get_template_directory() . '/inc/functions/register-options-page.php';
