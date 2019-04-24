# This file contains a user story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

Feature:
  Je test Behat

  Scenario: J'affiche la page de livres et je vérifie le titre
    When I load the "/books"
    Then the page containe "List of books : "

  Scenario: J'affiche un livre et je vérifie que seul lui est là
    When I load the "/book/0"
    Then the page containe "Lotr1"
    Then the page not containe "Lotr2"
    Then the page not containe "Lotr3"
