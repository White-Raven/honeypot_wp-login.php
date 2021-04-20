# wp-honeypot

A simple honeypot based on the original wordpress login and lost password pages.
Pulled some of their scripts that have no real use just so the page doesn't seem too "empty", and kept the same css file names (even if I pruned their content), just in case some bots may verify for some ressources to be there.
Almost untouched HTML content so bots shouldn't have an issue injecting their stuff in the forms.


I'm not claiming assets nor in any way am affiliated with wordpress.

I'm just amused of seeing bots visit daily a page /wp-login.php that returns a 404 header, so I decided to have some fun with it.

The fooyoubots.php is there to give you an easy hook to redirect them where-ever you want after their login/recovery attempt, without eventually triggering the form-action Content Security Policies active on your website, or having to put a hole into it.
