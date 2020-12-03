# PhpStorm attributes

Use these PHP 8 attributes in PhpStorm to get more advanced code completion and analysis.

Learn more in the [blog post](https://blog.jetbrains.com/phpstorm/2020/10/phpstorm-2020-3-eap-4/).

## Installation
The attributes are available in PhpStorm 2020.3 and later. They are bundled with PhpStorm so you don’t need to install them separately.

If you are using other static analysis tools and don’t want to get Class not found issues, then you might want to add the attributes package to your composer.json as a dev dependency:

```
composer require --dev jetbrains/phpstorm-attributes
```

## `#[Deprecated]`
Use this attribute when you want to notify users that an entity will be removed in the future.

Provide the explanation tip in `reason`  and updating suggestion in `replacement`.

```PHP
#[Deprecated(
    reason: 'since Symfony 5.2, use setPublic() instead',
    replacement: '%class%->setPublic(!%parameter0%)'
)]
```

## `#[ArrayShape]`
Use Array Shape when you deal with object-like arrays and want to specify the keys’ names and types for values to get better coding assistance.

```PHP
#[ArrayShape([
 // ‘key’ => ’type’,
    ‘key1’ => ‘int’,
    ‘key2’ => ‘string’,
    ‘key3’ => ‘Foo’,
    ‘key3’ => App\PHP 8\Foo::class,
])]
function functionName(
    #[ArrayShape([
        ‘key1’ => ‘int’,
        ‘key2’ => ‘string’,
        ‘key3’ => ‘Foo’,
    ])]
    array $parameter
): array
```

> The attribute works with PHP ≤ 7.4 if specified in one line.

## `#[Immutable]`
Mark properties or entire objects with this attribute if you want to guarantee they won't be changed after initialization.

```PHP
#[Immutable]
class DTO
{
    public string $val;

    public function __construct(string $val)
    {
        $this->val = $val;
    }
}
```

> The attribute works with PHP ≤ 7.4 if specified in one line.

## `#[Pure]`
Use this attribute for functions that do not produce any side effects. All such PHP internal functions are already marked in PhpStorm.

```PHP
#[Pure]
function compare(Foo $a, Foo $b): int
{
    return $a->a <=> $b->b;
}
```

## `#[ExpectedValues]`
Use this attribute to specify which values exactly a function accepts as parameters and which it can return. This will improve coding assistance.

```PHP
function response(
    #[ExpectedValues(valuesFromClass: Response::class)] $httpStatusCode,
    //...
) {
    //...
}
```

## `#[NoReturn]`
Mark functions that terminate script execution as exit points with this attribute to get a more accurate control flow analysis.

```PHP
#[NoReturn]
function redirect(): void {
   //...
   exit();
}
```

## `#[Language]`
Add this attribute to mark string parameters that contain text in some other [programming] language, for example, RegExp, SQL, and so on. This will improve highlighting and reveal additional features of PhpStorm for you.

## Bugs and feature requests
Please report any issues to the PhpStorm issue tracker https://youtrack.jetbrains.com/newIssue?project=WI.

Pull requests are also welcome.
