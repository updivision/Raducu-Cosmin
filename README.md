# Interview
## Note
This interview is intended to evaluate the knowledge of the Laravel framework, as well as knowledge of more generic programming concepts, such as data structures and design patterns.

## Assignment
Develop an API endpoint that is capable of returning a paginated collection of different types of objects. The endpoint should also receive a "quantity" query parameter that specifies how many products should be generated.

Each object represents a product that could be sold in an online shop.

There are only 3 types of products: Books, Music and Fashion items, each with their own set of attributes.

Some attributes should always be present on a product and should have a procedurally generated value. These attributes are marked as "required".

Some attributes should randomly be present or not. These attributes are marked as "optional". It is up to you to decide when to add an optional attribute to a product and when to omit it, by adding a condition. When present an optional attribute should always have a value.

### Product Types
##### Fashion
 - **type** - required
    A string containing the value "FASHION"
 - **name** - required
    An alpha-numeric attribute representing the name of the product. Should contain between 1 and 3 words.
 - **size** - required
    An alpha string containing common t-shirt sizes. (XS, S, M, L, XL)
 - **brand** - optional
    An alpha-numeric attribute representing the name of the product. Should contain just 1 word.  
 - **gallery** - required
    A collection of URL strings, representing a gallery of product images. *Note:* The URLs should actually resolve to valid static images.
 - **price** - required
    A float number representing the price of the product.
 - **discount** - optional
    An integer number representing a product discount. The generated discount should not be greater than 1 or smaller than 0.
 - **quantity** - optional
    An integer number representing the quantity of the product in stock.

##### Books
 - **type** - required
    A string containing the value "BOOK"
 - **name** - required
    An alpha-numeric attribute representing the name of the product. Should contain between 1 and 3 words.
 - **author** - required
    An alpha string representing the author name. Should contain only 2 words.
 - **image** - required
    A string representing a the cover of the book. *Note:* The URL should resolve to valid static images.
 - **excerpt** - optional
    A string representing a short excerpt from the book. Should contain a maximum of 200 words.
 - **publisher** - optional
    A string representing the publishing house of the book. Should contain between 1 and 3 words.
 - **price** - required
    A float number representing the price of the product.
 - **discount** - optional
    An integer number representing a product discount. The generated discount should not be greater than 1 or smaller than 0.
 - **quantity** - optional
    An integer number representing the quantity of the product in stock.

##### Music
 - **type** - required
    A string containing the value "MUSIC"
 - **name** - required
    An alpha-numeric attribute representing the name of the album. Should contain between 1 and 5 words.
 - **artist** - reuired
    An alpha string representing the artists name. Should contain between 1 and 5 words.
 - **media** - optional
    A string containing a media type (eg. CD. DVD, Vinyl).  
 - **image** - optional
    A string representing a the cover of the album. *Note:* The URL should resolve to valid static images.
 - **price** - required
    A float number representing the price of the product.
 - **discount** - optional
    An integer number representing a product discount. The generated discount should not be greater than 1 or smaller than 0.
 - **quantity** - optional
    An integer number representing the quantity of the product in stock.

## Note
For the generation of various test values we recommend using Laravel's built-in factory functionality (https://laravel.com/docs/8.x/database-testing#defining-model-factories) or a similar 3rd-party library.

### Mock Request / Response
`http://laravel.app/api/v1/products?quantity=50`
```json
{
   "total": 50,
   "per_page": 15,
   "current_page": 1,
   "last_page": 4,
   "first_page_url": "http://laravel.app?page=1?quantity=50",
   "last_page_url": "http://laravel.app?page=4?quantity=50",
   "next_page_url": "http://laravel.app?page=2?quantity=50",
   "prev_page_url": null,
   "path": "http://laravel.app",
   "from": 1,
   "to": 15,
   "data":[
        {
            "type": "FASHION",
            "name": "Red T-Shirt",
            "size": "M",
            "gallery": [
                "https://picsum.photos/id/10/300/300",
                "https://picsum.photos/id/11/300/300",
                "https://picsum.photos/id/12/300/300",
            ],
            "price": "100",
            "discount": "0.2",
            "quantity": "10"
        },
        {
            "type": "BOOK",
            "name": "SF Novel",
            "author": "Lorem Ipsum",
            "image": "https://picsum.photos/id/10/300/300",
            "publisher": "Sit Amet",
            "price": "50",
            "quantity": "20"
        },
        {
            "type": "MUSIC",
            "name": "Country Album",
            "artist": "Consectetur Adipiscing",
            "media": "Vinyl",
            "price": "75",
            "discount": "0.3"
        },
        // ...
   ]
}
```
