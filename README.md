wp-cli-post-permalink
=====================
  
Post permalink community package for WP-CLI.
  
Command added
-------------

**NAME**
  
    wp post permalink
  
**DESCRIPTION**
  
    Implements post permalink command, to list the post permalink.
  
**SYNOPSIS**
  
    wp post permalink <id>... [--format=<format>]
  
**EXAMPLES**
  
    $ wp post permalink 3114 3040
    +------+--------------------------------------+
    | ID   | permalink                            |
    +------+--------------------------------------+
    | 3114 | https://www.example.com/hello-world/ |
    | 3040 | https://www.example.com/hello-mars/  |
    +------+--------------------------------------+
  
    $ wp post permalink 3114 3040 --format=csv
    ID,permalink
    3114,https://www.example.com/hello-world/
    3040,https://www.example.com/hello-mars/
    