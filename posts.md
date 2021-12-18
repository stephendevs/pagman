[![](https://raw.githubusercontent.com/stephendevs/stephendevs/main/pagman/bannner.png)](ttps://www.linkedin.com/in/stephendev)

# Pagman Posts 👋.

The post table stores almost everything that will be displayed on the website, ranging from page content, images, docuuments etc.

Posts Table

`id` `post_type` `post_name` `url`

PostContents Table

`id` `post_id` `content` `content_mime_type`

Each post may have multiple post content with different mime types eg for the case of the slider post type which can have individual slider items on the post content.

Default Post Types `->` `standard` `page` `custom_url` `image` The theme can also define its custom post_types eg `slider` to hold your slider content.

The default posts for the theme or template must be stored in the posts configuration file as show below

```php
'posts' => [
    [
        'post_type' => 'page',
        'post_name' => 'name',
        'content' => 'The content of the post'
    ]
]

