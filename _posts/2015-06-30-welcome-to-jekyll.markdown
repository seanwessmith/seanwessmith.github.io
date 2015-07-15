---
layout: post
title:  "How this website was created using Jekyll and Heroku"
date:   2015-07-09 20:55:33
categories: jekyll update
---
1. Open the Terminal app. Check out rbenv into ~/.rbenv.
{% highlight bash %}
$ git clone https://github.com/sstephenson/rbenv.git ~/.rbenv
{% endhighlight %}
2. Add ~/.rbenv/bin to your $PATH for access to the rbenv command-line utility.
{% highlight bash %}
$ echo 'export PATH="$HOME/.rbenv/bin:$PATH"' >> ~/.bash_profile
{% endhighlight %}
3. Add rbenv init to your shell to enable shims and autocompletion.
{% highlight bash %}
$ echo 'eval "$(rbenv init -)"' >> ~/.bash_profile
{% endhighlight %}
4. Close and reopen the Terminal app.
{% highlight bash %}
$ type rbenv
{% endhighlight %}
5. Install ruby
{% highlight bash %}
$ rbenv install 2.0.0-p247
{% endhighlight %}
6. Install bundler
{% highlight bash %}
$ gem install bundler
{% endhighlight %}
7. Install Jekyll
{% highlight bash %}
$ gem install jekyll
{% endhighlight %}
8. Create a new website
{% highlight bash %}
$ jekyll new my-awesome-site
{% endhighlight %}
9. Change to the new directory
{% highlight bash %}
cd my-awesome-site
{% endhighlight %}
10. Create a Gemfile
{% highlight bash %}
bundle init
{% endhighlight %}
11. Open and edit the new Gemfile
{% highlight bash %}
vi gemfile
{% endhighlight %}
12. Paste the following into the gemfile
{% highlight bash %}
source 'https://rubygems.org'
ruby '2.0.0'
gem 'jekyll'
gem 'kramdown'
gem 'rack-jekyll'
gem 'RedCloth'
gem 'thin'
gem 'rake'
gem 'puma'
{% endhighlight %}
13. Go to heroku.com and create an account. Go back to the terminal and run the following.
{% highlight bash %}
heroku create -s cedar
{% endhighlight %}
14. Open and edit the procfile
{% highlight bash %}
vi Procfile
{% endhighlight %}
15. Paste the following into the new Procfile
{% highlight bash %}
web: bundle exec puma -t 8:32 -w 3 -p $PORT
{% endhighlight %}
16. Create a rakefile
{% highlight bash %}
file "rakefile.tmp" => "tmp" do
{% endhighlight %}
17. Open and edit the new rakefile.
{% highlight bash %}
vi rakefile.tmp
{% endhighlight %}
18. Paste the following into the new rakefile.
{% highlight bash %}
namespace :assets do
  task :precompile do
    puts `bundle exec jekyll build`
  end
end
{% endhighlight %}
19. Open and edit the _ config.yml file
{% highlight bash %}
vi config.yml
{% endhighlight %}
20. Paste the following into the _ config.yml file
{% highlight bash %}
# Site settings
title: Your awesome title
email: your-email@domain.com
description: > # this means to ignore newlines until "baseurl:"
  Write an awesome description for your new site here. You can edit this
  line in _ config.yml. It will appear in your document head meta (for
  Google search results) and in your feed.xml site description.
baseurl: "" # the subpath of your site, e.g. /blog/
url: "http://yourdomain.com" # the base hostname & protocol for your site
twitter_username: jekyllrb
github_username:  jekyll
# Build settings
markdown: kramdown
#http://www.jamesward.com/2014/09/24/jekyll-on-heroku
gems: ['kramdown']
exclude: ['config.ru', 'Gemfile', 'Gemfile.lock', 'vendor', 'Procfile', 'Rakefile']
{% endhighlight %}

21. Open and edit the config.ru file
{% highlight bash %}
vi config.ru
{% endhighlight %}
22. Paste the following into the config.ru file.
{% highlight bash %}
require 'rack/jekyll'
require 'yaml'
run Rack::Jekyll.new
{% endhighlight %}
23. Save everything to the heroku server.
{% highlight bash %}
git push heroku master
{% endhighlight %}
24. Run Jekyll locally to test the configuration you just implemented.
{% highlight bash %}
bundle exec jekyll serve --watch
{% endhighlight %}

To add new posts, simply add a file in the `_posts` directory that follows the convention `YYYY-MM-DD-name-of-post.ext` and includes the necessary front matter. Take a look at the source for this post to get an idea about how it works.

Jekyll also offers powerful support for code snippets:

Check out the [Jekyll docs][jekyll] for more info on how to get the most out of Jekyll. File all bugs/feature requests at [Jekyll’s GitHub repo][jekyll-gh]. If you have questions, you can ask them on [Jekyll’s dedicated Help repository][jekyll-help].

[jekyll]:      http://jekyllrb.com
[jekyll-gh]:   https://github.com/jekyll/jekyll
[jekyll-help]: https://github.com/jekyll/jekyll-help
