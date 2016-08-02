# bogotext-chapo-img
add support for img in chapo

## Attention !

Cette version n'a pas vocation à être utiliser en production dû au fait qu'il faille modifier le coeur de blogotext !

### blogotext !== testing
Pour que ce plugin fonctionne : 
 - remplacer {article_chapo} par {addon_chapo_img} dans vos templates
 - modifier le coeur tel que : https://github.com/timovn/blogotext/pull/72
 - Ajouter "addon_chapo_img.php" dans le dossier "addons" de votre blogotext

### blogotext === testing
Pour que ce plugin fonctionne : 
 - remplacer {article_chapo} par {addon_chapo_img} dans vos templates
 - Ajouter le dossier "chapo_img" dans le dossier "addons" de votre blogotext
