[![Latest Stable Version](http://poser.pugx.org/tkhamez/neucore-plugin/v)](https://packagist.org/packages/tkhamez/neucore-plugin) 
[![Total Downloads](http://poser.pugx.org/tkhamez/neucore-plugin/downloads)](https://packagist.org/packages/tkhamez/neucore-plugin) 
[![License](http://poser.pugx.org/tkhamez/neucore-plugin/license)](https://packagist.org/packages/tkhamez/neucore-plugin) 
[![PHP Version Require](http://poser.pugx.org/tkhamez/neucore-plugin/require/php)](https://packagist.org/packages/tkhamez/neucore-plugin)
[![build](https://github.com/tkhamez/neucore-plugin/workflows/test/badge.svg)](https://github.com/tkhamez/neucore-plugin/actions)

# neucore-plugin

Classes necessary to write a [Neucore](https://github.com/tkhamez/neucore) plugin.

Documentation can be found in the Neucore repository at 
https://github.com/tkhamez/neucore/blob/main/doc/Plugins.md.

For a list of plugins see https://github.com/tkhamez/neucore#plugins-and-related-software.

## Dev Env

```shell
docker build --tag neucore-plugin .
docker run -it --mount type=bind,source="$(pwd)",target=/app --workdir /app neucore-plugin /bin/sh
```
