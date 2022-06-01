Feature: City State Token

Scenario: The contacts primary address has a City and a State.

When the {citystate.citystate} token is used
And the contacts primary address State is set as "Arizona"
And the contacts primary address City is set as "Phoneix"
Then the {citystate.citystate} will read "Phoneix, AZ"

Scenario: The contacts primary address has a City and but no State.

When the {citystate.citystate} token is used
And the contacts primary address State is not set
And the contacts primary address City is set as "Phoneix"
Then the {citystate.citystate} will read "Phoneix"

Scenario: The contacts primary address has no City but does have a State.

When the {citystate.citystate} token is used
And the contacts primary address State is set as "Arizona"
And the contacts primary address City is not set
Then the {citystate.citystate} will read "AZ"

Scenario: The contacts primary address has no City or state

When the {citystate.citystate} token is used
And the contacts primary address State is not set
And the contacts primary address City is not set
Then the {citystate.citystate} will read ""
