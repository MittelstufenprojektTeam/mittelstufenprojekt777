#Wichtige Informationen
- Für das Erstellen eines Users wird folgendes Benötigt:
 Ein hashed Passwort, und ein roles Array.
```bash
$ php bin/console security:hash-password

## dann für den User ([0] auswählen)
## und dann das passwort eingeben. 
## Der output ist dann das gehashte Passwort 
 ```
```
Beides kann dann direkt in die DB per Hand eingetragen
wie folgt werden die Rolls eingetragen: ["ROLE_1", "ROLE_2"]
```

#known Bugs:
```
- Cannot Assign Type of PersistensCollection to type of ArrayCollection
- Der Typ muss einfach das Attribut ein Typ von Collection bekommen
```

# Mittelstufenprojekt

Als Azubi möchte ich über meinen Wissensstand Überblick behalten, um meinen Lernfortschritt über die Zeit
nachzuverfolgen, 

Als Azubi möchte ich den Lernfortschritt mit anderen teilen, um Defizite mit anderen zu vergleichen und
sich so gegenseitig zu unterstützen. 

Als Azubi, möchte ich die Aufgaben aus den Pools bevorzugt werden, die ich noch
nicht, oder nicht richtig oder am seltensten beantwortet habe, um meinen Lernfortschritt zu verbessern.

Als Azubi möchte
ich diese App auch als Nachschlagewerk nutzen und stelle mir hierfür einen separaten Informationsbereich mit den
prüfungsrelevanten Themen vor. Dieser Bereich dient der Vertiefung der Themen, in denen man als Azubi weniger
Lernfortschritt erzielt, Themen sind z.B. SQL, Subnetting, Header-Analyse, die gängigsten Fachbegriffe,
Kostenkalkulation.

Als Azubi, möchte ich nach einer Aufgabe die Möglichkeit haben, die richtige Lösung einzusehen, um
meine Rückmeldung zu der Richtigkeit meiner Frage zu erhalten. 

Als Azubi möchte ich, dass eine richtige Antworte mit
grün für richtig und rot für eine falsche Antwort markiert wird. 

Als Azubi möchte ich bei Freitext Aufgaben eine
Musterlösung angezeigt wird, um selbst zu entscheidet, ob die Aufgabe richtig beantwortet ist.

Als Azubi möchte ich in
der Lage sein, Aufgabenvorschläge für die App einzusenden.

Als Azubi möchte ich verschieden Fragebögen bearbeiten können,
basierend auf dem bisherigen Lernfortschritt. Dadurch kann ich die App gezielt nach meinen Lehrmethoden verwenden.▪ Nur
die Aufgaben die ich bisher falsch beantwortet habe▪ Noch nicht Beantwortete Aufgaben▪ Aufgaben aus einem oder mehreren
Lernfeldern

Als Azubi will ich in der App Prüfungssimulation mit begrenzter Zeit durchlaufen. 

Als Abzubi möchte ich vor
der Prüfungssimulation mit einem Disclaimer darüber aufgeklärt werden, dass die richtige Abschlussprüfung von dieser
Simulation stark abweichen kann.


## Update Styling

Compile assets automatically re-compiel when files change
```
npm run watch
```

run a dev-server that can sometimes update your code withput refreshing the page
```
npm dev-server
```
compile assets once
```
npm dev
```

on deploy, create a production build
```
npm build
```
Stop and restart encore each time you update your webpack.config.js file.