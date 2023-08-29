# Active Ingredients

Active Ingredient resource requests

## Add active ingredient

<small class="badge badge-darkred">requires authentication</small>

Adds a new active ingredient item to database

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/active_ingredients" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"id","potential_harm":{},"aquatic":{},"aquatic_desc":{},"bees":{},"bees_desc":{},"earthworm":{},"earthworm_desc":{},"birds":{},"birds_desc":{},"leachability":{},"leachability_desc":{},"carcinogenicity":{},"mutagenicity":{},"edc":{},"reproduction":{},"ache":{},"neurotoxicant":{},"who_classification":{},"eu_approved":{}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "name": "id",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients'
payload = {
    "name": "id",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/active_ingredients',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'id',
            'potential_harm' => [],
            'aquatic' => [],
            'aquatic_desc' => [],
            'bees' => [],
            'bees_desc' => [],
            'earthworm' => [],
            'earthworm_desc' => [],
            'birds' => [],
            'birds_desc' => [],
            'leachability' => [],
            'leachability_desc' => [],
            'carcinogenicity' => [],
            'mutagenicity' => [],
            'edc' => [],
            'reproduction' => [],
            'ache' => [],
            'neurotoxicant' => [],
            'who_classification' => [],
            'eu_approved' => [],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{
    "code": 201,
    "message": "Saved",
    "success": true,
    "data": {
        "id": 76,
        "name": "Loremus Chloridus",
        "potential_harm": null,
        "aquatic": null,
        "aquatic_desc": null,
        "bees": null,
        "bees_desc": null,
        "earthworm": null,
        "earthworm_desc": null,
        "birds": null,
        "birds_desc": null,
        "leachability": null,
        "leachability_desc": null,
        "carcinogenicity": null,
        "mutagenicity": null,
        "edc": null,
        "reproduction": null,
        "ache": null,
        "neurotoxicant": null,
        "who_classification": null,
        "eu_approved": null,
        "image": null
    }
}
```
> Example response (501, Active ingredient not created):

```json
{
    "code": 501,
    "message": "Not Created",
    "success": false
}
```
<div id="execution-results-POSTapi-active_ingredients" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-active_ingredients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-active_ingredients"></code></pre>
</div>
<div id="execution-error-POSTapi-active_ingredients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-active_ingredients"></code></pre>
</div>
<form id="form-POSTapi-active_ingredients" data-method="POST" data-path="api/active_ingredients" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-active_ingredients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/active_ingredients</code></b>
</p>
<p>
<label id="auth-POSTapi-active_ingredients" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-active_ingredients" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-active_ingredients" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="POSTapi-active_ingredients" data-component="body"  hidden>
<br>

</p>

</form>


## Update active ingredient

<small class="badge badge-darkred">requires authentication</small>

Updates the active ingredient based on the ID

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/active_ingredients/et" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"name":"corrupti","potential_harm":{},"aquatic":{},"aquatic_desc":{},"bees":{},"bees_desc":{},"earthworm":{},"earthworm_desc":{},"birds":{},"birds_desc":{},"leachability":{},"leachability_desc":{},"carcinogenicity":{},"mutagenicity":{},"edc":{},"reproduction":{},"ache":{},"neurotoxicant":{},"who_classification":{},"eu_approved":{}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/et"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "name": "corrupti",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/et'
payload = {
    "name": "corrupti",
    "potential_harm": {},
    "aquatic": {},
    "aquatic_desc": {},
    "bees": {},
    "bees_desc": {},
    "earthworm": {},
    "earthworm_desc": {},
    "birds": {},
    "birds_desc": {},
    "leachability": {},
    "leachability_desc": {},
    "carcinogenicity": {},
    "mutagenicity": {},
    "edc": {},
    "reproduction": {},
    "ache": {},
    "neurotoxicant": {},
    "who_classification": {},
    "eu_approved": {}
}
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://localhost:8000/api/active_ingredients/et',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'corrupti',
            'potential_harm' => [],
            'aquatic' => [],
            'aquatic_desc' => [],
            'bees' => [],
            'bees_desc' => [],
            'earthworm' => [],
            'earthworm_desc' => [],
            'birds' => [],
            'birds_desc' => [],
            'leachability' => [],
            'leachability_desc' => [],
            'carcinogenicity' => [],
            'mutagenicity' => [],
            'edc' => [],
            'reproduction' => [],
            'ache' => [],
            'neurotoxicant' => [],
            'who_classification' => [],
            'eu_approved' => [],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (201):

```json
{
    "code": 201,
    "message": "Updated",
    "success": true,
    "data": {
        "id": 76,
        "name": "Loremus Chloridus",
        "potential_harm": null,
        "aquatic": 0.028,
        "aquatic_desc": "Aquaticus Descreepticus",
        "bees": null,
        "bees_desc": null,
        "earthworm": null,
        "earthworm_desc": null,
        "birds": null,
        "birds_desc": null,
        "leachability": null,
        "leachability_desc": null,
        "carcinogenicity": null,
        "mutagenicity": null,
        "edc": null,
        "reproduction": null,
        "ache": null,
        "neurotoxicant": null,
        "who_classification": null,
        "eu_approved": null,
        "image": null
    }
}
```
> Example response (501, Update failed):

```json
{
    "code": 501,
    "message": "Update Unsuccessful",
    "success": false
}
```
<div id="execution-results-PUTapi-active_ingredients--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-active_ingredients--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-active_ingredients--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-active_ingredients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-active_ingredients--id-"></code></pre>
</div>
<form id="form-PUTapi-active_ingredients--id-" data-method="PUT" data-path="api/active_ingredients/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-active_ingredients--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/active_ingredients/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-active_ingredients--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-active_ingredients--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-active_ingredients--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-active_ingredients--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="PUTapi-active_ingredients--id-" data-component="body"  hidden>
<br>

</p>

</form>


## Delete active ingredient

<small class="badge badge-darkred">requires authentication</small>

Deletes an active ingredient based on the id value

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/active_ingredients/recusandae" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/recusandae"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/recusandae'
headers = {
  'Authorization': 'Bearer {YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://localhost:8000/api/active_ingredients/recusandae',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "code": 200,
    "message": "Deleted",
    "success": true,
    "data": null
}
```
> Example response (501, Delete failed):

```json
{
    "code": 501,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-DELETEapi-active_ingredients--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-active_ingredients--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-active_ingredients--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-active_ingredients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-active_ingredients--id-"></code></pre>
</div>
<form id="form-DELETEapi-active_ingredients--id-" data-method="DELETE" data-path="api/active_ingredients/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-active_ingredients--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/active_ingredients/{id}</code></b>
</p>
<p>
<label id="auth-DELETEapi-active_ingredients--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-active_ingredients--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-active_ingredients--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Get all active ingredients


Retrieve all active ingredients

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients?order_column=repellat&order_direction=laborum&per_page=ratione" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients"
);

let params = {
    "order_column": "repellat",
    "order_direction": "laborum",
    "per_page": "ratione",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients'
params = {
  'order_column': 'repellat',
  'order_direction': 'laborum',
  'per_page': 'ratione',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'order_column'=> 'repellat',
            'order_direction'=> 'laborum',
            'per_page'=> 'ratione',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
  "data": [
     {
         "id": 1,
         "name": "At vero eos",
         "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "aquatic": 1.5,
         "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "bees": 72,
         "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "earthworm": 999,
         "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "birds": 315,
         "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "leachability": -19.89,
         "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "carcinogenicity": "No",
         "mutagenicity": "No Data",
         "edc": "No",
         "reproduction": "Possible",
         "ache": "No",
         "neurotoxicant": "No",
         "who_classification": "II",
         "eu_approved": "No",
         "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
         "agrochems": [
             {
                 "id": 99,
                 "product_name": "Curabitur",
                 "pcpb_number": "PCPB(CR)9999",
                 "distributing_company": "Donec sit amet. Ltd.",
                 "who_class": "II",
                 "toxic": 1,
                 "composition": "999g\/L as dui vitae ultricies",
                 "registrant": "Aenean facilisis ultrices dui tempus lacinia",
                 "type": null,
                 "phi_days": 99,
                 "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
             },
             .
             .
             .

         ]
     },
     .
     .
     .
  ],
  "links": {
     "first": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=1",
     "last": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=4",
     "prev": null,
     "next": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=2"
  },
  "meta": {
     "current_page": 1,
     "from": 1,
     "last_page": 4,
     "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients",
     "per_page": "16",
     "to": 16,
     "total": 60
  }
}
```
> Example response (404, Items not found):

```json
{
    "code": 404,
    "message": "Items not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients"></code></pre>
</div>
<form id="form-GETapi-active_ingredients" data-method="GET" data-path="api/active_ingredients" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-active_ingredients" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-active_ingredients" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="per_page" data-endpoint="GETapi-active_ingredients" data-component="query"  hidden>
<br>

</p>
</form>


## Search active ingredients


Performs search on active ingredient records based on query parameter values

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/filter/sit?per_page=1&order_direction=desc&order_column=id&potential_harm=adipisci&aquatic_desc=voluptatum&bees_desc=quo&earthworm_desc=laudantium&birds_desc=repellendus&leachability_desc=et&carcinogenicity=aperiam&mutagenicity=temporibus&edc=deserunt&reproduction=ab&ache=expedita&neurotoxicant=harum&who_classification=rem&eu_approved=in" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/filter/sit"
);

let params = {
    "per_page": "1",
    "order_direction": "desc",
    "order_column": "id",
    "potential_harm": "adipisci",
    "aquatic_desc": "voluptatum",
    "bees_desc": "quo",
    "earthworm_desc": "laudantium",
    "birds_desc": "repellendus",
    "leachability_desc": "et",
    "carcinogenicity": "aperiam",
    "mutagenicity": "temporibus",
    "edc": "deserunt",
    "reproduction": "ab",
    "ache": "expedita",
    "neurotoxicant": "harum",
    "who_classification": "rem",
    "eu_approved": "in",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/filter/sit'
params = {
  'per_page': '1',
  'order_direction': 'desc',
  'order_column': 'id',
  'potential_harm': 'adipisci',
  'aquatic_desc': 'voluptatum',
  'bees_desc': 'quo',
  'earthworm_desc': 'laudantium',
  'birds_desc': 'repellendus',
  'leachability_desc': 'et',
  'carcinogenicity': 'aperiam',
  'mutagenicity': 'temporibus',
  'edc': 'deserunt',
  'reproduction': 'ab',
  'ache': 'expedita',
  'neurotoxicant': 'harum',
  'who_classification': 'rem',
  'eu_approved': 'in',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/filter/sit',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'per_page'=> '1',
            'order_direction'=> 'desc',
            'order_column'=> 'id',
            'potential_harm'=> 'adipisci',
            'aquatic_desc'=> 'voluptatum',
            'bees_desc'=> 'quo',
            'earthworm_desc'=> 'laudantium',
            'birds_desc'=> 'repellendus',
            'leachability_desc'=> 'et',
            'carcinogenicity'=> 'aperiam',
            'mutagenicity'=> 'temporibus',
            'edc'=> 'deserunt',
            'reproduction'=> 'ab',
            'ache'=> 'expedita',
            'neurotoxicant'=> 'harum',
            'who_classification'=> 'rem',
            'eu_approved'=> 'in',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
  "data": [
     {
         "id": 1,
         "name": "At vero eos",
         "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "aquatic": 1.5,
         "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "bees": 72,
         "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "earthworm": 999,
         "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "birds": 315,
         "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "leachability": -19.89,
         "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
         "carcinogenicity": "No",
         "mutagenicity": "No Data",
         "edc": "No",
         "reproduction": "Possible",
         "ache": "No",
         "neurotoxicant": "No",
         "who_classification": "II",
         "eu_approved": "No",
         "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
         "agrochems": [
             {
                 "id": 99,
                 "product_name": "Curabitur",
                 "pcpb_number": "PCPB(CR)9999",
                 "distributing_company": "Donec sit amet. Ltd.",
                 "who_class": "II",
                 "toxic": 1,
                 "composition": "999g\/L as dui vitae ultricies",
                 "registrant": "Aenean facilisis ultrices dui tempus lacinia",
                 "type": null,
                 "phi_days": 99,
                 "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
             },
             .
             .
             .

         ]
     },
     .
     .
     .
  ],
  "links": {
     "first": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=1",
     "last": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=4",
     "prev": null,
     "next": "https://api.safeinputs.koan.co.ke/api/active_ingredients?page=2"
  },
  "meta": {
     "current_page": 1,
     "from": 1,
     "last_page": 4,
     "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients",
     "per_page": "16",
     "to": 16,
     "total": 60
  }
}
```
> Example response (404, Items not found):

```json
{
    "code": 404,
    "message": "Items not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients-filter--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-filter--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-filter--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-filter--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-filter--search_value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-filter--search_value--" data-method="GET" data-path="api/active_ingredients/filter/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-filter--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/filter/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
asc | desc
</p>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
*use query parameter names below*
</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="GETapi-active_ingredients-filter--search_value--" data-component="query"  hidden>
<br>
yes | no
</p>
</form>


## Datatable


Implementation for use with Datatables to populate table with active ingredients records.
Use the full request url in configuring the datatable.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/datatable" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/datatable"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/datatable'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/datatable',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

status = 200
{
     "current_page": 1,
     "data": [
         {
             "id": 1,
             "name": "At vero eos",
             "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
             "aquatic": 1.5,
             "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
             "bees": 72,
             "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
             "earthworm": 999,
             "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
             "birds": 315,
             "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
             "leachability": -19.89,
             "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
             "carcinogenicity": "No",
             "mutagenicity": "No Data",
             "edc": "No",
             "reproduction": "Possible",
             "ache": "No",
             "neurotoxicant": "No",
             "who_classification": "II",
             "eu_approved": "No",
             "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=1",
     "from": 1,
     "last_page": 4,
     "last_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=4",
     "next_page_url": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable?page=2",
     "path": "https://api.safeinputs.koan.co.ke/api/active_ingredients/datatable",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 60
}
```
<div id="execution-results-GETapi-active_ingredients-datatable" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-datatable"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-datatable"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-datatable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-datatable"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-datatable" data-method="GET" data-path="api/active_ingredients/datatable" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-datatable', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/datatable</code></b>
</p>
</form>


## Get all active ingredient names


Retrieve all active ingredient names.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/names" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/names"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/names'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/names',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "code": 200,
     "message": "60 Items found",
     "success": true,
     "data": [
         {
             "id": 15,
             "name": "Acephate"
         },
         {
             "id": 23,
             "name": "Acrinathrin"
         },
         .
         .
         .
     ]
}
```
> Example response (404, Items not found):

```json
{
    "code": 404,
    "message": "Items not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients-names" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-names"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-names"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-names" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-names"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-names" data-method="GET" data-path="api/active_ingredients/names" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-names', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/names</code></b>
</p>
</form>


## Get active ingredient names


Returns only name, id and image.
Can be filtered based on query parameters

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/summary/names/sint?per_page=1&order_direction=desc&order_column=id&name=voluptate&potential_harm=officiis&aquatic_desc=non&bees_desc=harum&earthworm_desc=eos&birds_desc=quidem&leachability_desc=eveniet&carcinogenicity=consequuntur&mutagenicity=iure&edc=error&reproduction=animi&ache=saepe&neurotoxicant=et&who_classification=quae&eu_approved=iure" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/summary/names/sint"
);

let params = {
    "per_page": "1",
    "order_direction": "desc",
    "order_column": "id",
    "name": "voluptate",
    "potential_harm": "officiis",
    "aquatic_desc": "non",
    "bees_desc": "harum",
    "earthworm_desc": "eos",
    "birds_desc": "quidem",
    "leachability_desc": "eveniet",
    "carcinogenicity": "consequuntur",
    "mutagenicity": "iure",
    "edc": "error",
    "reproduction": "animi",
    "ache": "saepe",
    "neurotoxicant": "et",
    "who_classification": "quae",
    "eu_approved": "iure",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/summary/names/sint'
params = {
  'per_page': '1',
  'order_direction': 'desc',
  'order_column': 'id',
  'name': 'voluptate',
  'potential_harm': 'officiis',
  'aquatic_desc': 'non',
  'bees_desc': 'harum',
  'earthworm_desc': 'eos',
  'birds_desc': 'quidem',
  'leachability_desc': 'eveniet',
  'carcinogenicity': 'consequuntur',
  'mutagenicity': 'iure',
  'edc': 'error',
  'reproduction': 'animi',
  'ache': 'saepe',
  'neurotoxicant': 'et',
  'who_classification': 'quae',
  'eu_approved': 'iure',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/summary/names/sint',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'per_page'=> '1',
            'order_direction'=> 'desc',
            'order_column'=> 'id',
            'name'=> 'voluptate',
            'potential_harm'=> 'officiis',
            'aquatic_desc'=> 'non',
            'bees_desc'=> 'harum',
            'earthworm_desc'=> 'eos',
            'birds_desc'=> 'quidem',
            'leachability_desc'=> 'eveniet',
            'carcinogenicity'=> 'consequuntur',
            'mutagenicity'=> 'iure',
            'edc'=> 'error',
            'reproduction'=> 'animi',
            'ache'=> 'saepe',
            'neurotoxicant'=> 'et',
            'who_classification'=> 'quae',
            'eu_approved'=> 'iure',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "current_page": 1,
     "data": [
         {
             "id": 58,
             "name": "Esfenvalerate",
             "image": "b3e2c45c0551915175aeefdaf91d9c7a.png"
         },
         {
             "id": 57,
             "name": "Cypermethrin",
             "image": "f2341120f5a57a36e8a3813823ba1ae9.png"
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=1",
     "from": 1,
     "last_page": 4,
     "last_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=4",
     "next_page_url": "https://api.saferinputs.com/api/active_ingredients/summary/names?page=2",
     "path": "https://api.safeinputs.com/api/active_ingredients/summary/names",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 60
}
```
> Example response (404, Items not found):

```json
{
    "code": 404,
    "message": "Items not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients-summary-names--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-summary-names--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-summary-names--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-summary-names--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-summary-names--search_value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-summary-names--search_value--" data-method="GET" data-path="api/active_ingredients/summary/names/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-summary-names--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/summary/names/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
asc | desc
</p>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
*use query parameter names below*
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="GETapi-active_ingredients-summary-names--search_value--" data-component="query"  hidden>
<br>
yes | no
</p>
</form>


## Get total of active ingredient&#039;s agrochem products


Returns total

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/summary/count/agrochem?product_name=minima&pcpb_number=qui&distributing_company=laudantium&who_class=nemo&toxic=voluptas&registrant=quis" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/summary/count/agrochem"
);

let params = {
    "product_name": "minima",
    "pcpb_number": "qui",
    "distributing_company": "laudantium",
    "who_class": "nemo",
    "toxic": "voluptas",
    "registrant": "quis",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/summary/count/agrochem'
params = {
  'product_name': 'minima',
  'pcpb_number': 'qui',
  'distributing_company': 'laudantium',
  'who_class': 'nemo',
  'toxic': 'voluptas',
  'registrant': 'quis',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/summary/count/agrochem',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_name'=> 'minima',
            'pcpb_number'=> 'qui',
            'distributing_company'=> 'laudantium',
            'who_class'=> 'nemo',
            'toxic'=> 'voluptas',
            'registrant'=> 'quis',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "total": 99
}
```
<div id="execution-results-GETapi-active_ingredients-summary-count-agrochem" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-summary-count-agrochem"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-summary-count-agrochem"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-summary-count-agrochem" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-summary-count-agrochem"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-summary-count-agrochem" data-method="GET" data-path="api/active_ingredients/summary/count/agrochem" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-summary-count-agrochem', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/summary/count/agrochem</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-active_ingredients-summary-count-agrochem" data-component="query"  hidden>
<br>

</p>
</form>


## Get totals of active ingredients


Performs aggregations on active ingredient records based on query parameter values
Returns total

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/summary/count/ratione?name=sint&potential_harm=laboriosam&aquatic_desc=consequatur&bees_desc=quis&earthworm_desc=fugiat&birds_desc=aut&leachability_desc=nemo&carcinogenicity=ipsam&mutagenicity=necessitatibus&edc=modi&reproduction=nemo&ache=omnis&neurotoxicant=ducimus&who_classification=nostrum&eu_approved=et" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/summary/count/ratione"
);

let params = {
    "name": "sint",
    "potential_harm": "laboriosam",
    "aquatic_desc": "consequatur",
    "bees_desc": "quis",
    "earthworm_desc": "fugiat",
    "birds_desc": "aut",
    "leachability_desc": "nemo",
    "carcinogenicity": "ipsam",
    "mutagenicity": "necessitatibus",
    "edc": "modi",
    "reproduction": "nemo",
    "ache": "omnis",
    "neurotoxicant": "ducimus",
    "who_classification": "nostrum",
    "eu_approved": "et",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/summary/count/ratione'
params = {
  'name': 'sint',
  'potential_harm': 'laboriosam',
  'aquatic_desc': 'consequatur',
  'bees_desc': 'quis',
  'earthworm_desc': 'fugiat',
  'birds_desc': 'aut',
  'leachability_desc': 'nemo',
  'carcinogenicity': 'ipsam',
  'mutagenicity': 'necessitatibus',
  'edc': 'modi',
  'reproduction': 'nemo',
  'ache': 'omnis',
  'neurotoxicant': 'ducimus',
  'who_classification': 'nostrum',
  'eu_approved': 'et',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/summary/count/ratione',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'name'=> 'sint',
            'potential_harm'=> 'laboriosam',
            'aquatic_desc'=> 'consequatur',
            'bees_desc'=> 'quis',
            'earthworm_desc'=> 'fugiat',
            'birds_desc'=> 'aut',
            'leachability_desc'=> 'nemo',
            'carcinogenicity'=> 'ipsam',
            'mutagenicity'=> 'necessitatibus',
            'edc'=> 'modi',
            'reproduction'=> 'nemo',
            'ache'=> 'omnis',
            'neurotoxicant'=> 'ducimus',
            'who_classification'=> 'nostrum',
            'eu_approved'=> 'et',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "total": 99
}
```
<div id="execution-results-GETapi-active_ingredients-summary-count--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-summary-count--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-summary-count--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-summary-count--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-summary-count--search_value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-summary-count--search_value--" data-method="GET" data-path="api/active_ingredients/summary/count/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-summary-count--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/summary/count/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>potential_harm</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="potential_harm" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>aquatic_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="aquatic_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>bees_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bees_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>earthworm_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="earthworm_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>birds_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birds_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>leachability_desc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="leachability_desc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>carcinogenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="carcinogenicity" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>mutagenicity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="mutagenicity" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>edc</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="edc" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>reproduction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="reproduction" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>ache</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ache" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>neurotoxicant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="neurotoxicant" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no | possible | no data
</p>
<p>
<b><code>who_classification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_classification" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
<p>
<b><code>eu_approved</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="eu_approved" data-endpoint="GETapi-active_ingredients-summary-count--search_value--" data-component="query"  hidden>
<br>
yes | no
</p>
</form>


## Find active ingredient&#039;s agrochem products


Find agrochem products associated with the active ingredient based on id and column values provided by query params

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/quasi/agrochems?product_name=sapiente&pcpb_number=aut&distributing_company=nostrum&who_class=qui&toxic=aut&registrant=voluptas" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/quasi/agrochems"
);

let params = {
    "product_name": "sapiente",
    "pcpb_number": "aut",
    "distributing_company": "nostrum",
    "who_class": "qui",
    "toxic": "aut",
    "registrant": "voluptas",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/quasi/agrochems'
params = {
  'product_name': 'sapiente',
  'pcpb_number': 'aut',
  'distributing_company': 'nostrum',
  'who_class': 'qui',
  'toxic': 'aut',
  'registrant': 'voluptas',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/quasi/agrochems',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_name'=> 'sapiente',
            'pcpb_number'=> 'aut',
            'distributing_company'=> 'nostrum',
            'who_class'=> 'qui',
            'toxic'=> 'aut',
            'registrant'=> 'voluptas',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
     "data": {
         "id": 290,
         "name": "Aenean",
         "potential_harm": null,
         "aquatic": 0.035,
         "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
         "bees": 50,
         "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
         "earthworm": 79,
         "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
         "birds": 4237,
         "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
         "leachability": 2.57,
         "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem.</p>",
         "carcinogenicity": "No",
         "mutagenicity": "No Data",
         "edc": "Possible",
         "reproduction": "Possible",
         "ache": "No Data",
         "neurotoxicant": "Yes",
         "who_classification": "III",
         "eu_approved": "No",
         "image": "c96a9aec04ac2bba21fd8ed858sdf3bf.png",
         "agrochem": [
             {
                 "id": 322,
                 "product_name": "Curabitur",
                 "pcpb_number": "PCPB(CR)9999",
                 "distributing_company": "Duis feugiat magna",
                 "who_class": "III",
                 "toxic": 1,
                 "composition": "380 g/L",
                 "registrant": "Duis feugiat magna Co. Ltd",
                 "type": null,
                 "phi_days": 45,
                 "image": "436c77f117d073ea8ea2f4317abcf105.jpg"
             },
             .
             .
             .
         ]
     }
}
```
> Example response (404, No agrochems found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients--id--agrochems" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--agrochems"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--agrochems"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--agrochems" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--agrochems"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--agrochems" data-method="GET" data-path="api/active_ingredients/{id}/agrochems" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--agrochems', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/agrochems</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-active_ingredients--id--agrochems" data-component="query"  hidden>
<br>

</p>
</form>


## Find active ingredient&#039;s commercial organic alternative products


Find commercial organic alternatives for the agrochem product used for specific pests, diseases and weeds that contain the active ingredient based on its id and column values provided by query params associated with the commercial organic product

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/fuga/commercial_organic?name=et&pcpb_number=dolor&manufacturer=sed&distributor=minima&category=qui&contact_details=commodi&external_links=nostrum&application_details=ut" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/fuga/commercial_organic"
);

let params = {
    "name": "et",
    "pcpb_number": "dolor",
    "manufacturer": "sed",
    "distributor": "minima",
    "category": "qui",
    "contact_details": "commodi",
    "external_links": "nostrum",
    "application_details": "ut",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/fuga/commercial_organic'
params = {
  'name': 'et',
  'pcpb_number': 'dolor',
  'manufacturer': 'sed',
  'distributor': 'minima',
  'category': 'qui',
  'contact_details': 'commodi',
  'external_links': 'nostrum',
  'application_details': 'ut',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/fuga/commercial_organic',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'name'=> 'et',
            'pcpb_number'=> 'dolor',
            'manufacturer'=> 'sed',
            'distributor'=> 'minima',
            'category'=> 'qui',
            'contact_details'=> 'commodi',
            'external_links'=> 'nostrum',
            'application_details'=> 'ut',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

"data": {
     "total": 2,
     "items": [
         {
             "id": 213,
             "name": " Quisque",
             "type": "Pest",
             "scientific_name": "meyricki caffeina",
             "description_pest": "Etiam efficitur porta quam, eget blandit lorem.",
             "description_impact": "Etiam efficitur porta quam, eget blandit lorem.<",
             "image": "6a83920453f7369c9ca64a9552ef938d.jpg",
             "references": "",
             "commercial_organic": [
                 {
                     "id": 184,
                     "name": "Curabitur vestibulum",
                     "pcpb_number": "PCPB(CR)9999",
                     "manufacturer": "Mauris luctus maximus",
                     "distributor": "Sed accumsan ultric",
                     "category": "Biopesticide",
                     "contact_details": "Phasellus et dolor",
                     "external_links": "https://lorem.ipsum.com",
                     "application_details": "ed venenatis rhoncus urna, eu vehicula enim dictum in. Proin eget nisl ex. Aliquam finibus bibendum tortor volutpat ultricies. Nunc porta nisl id ultricies aliquam.",
                     "image": "de75345d3ba2eb753d06993a949a8702.png"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
     ]
}
```
> Example response (404, No commercial organic found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients--id--commercial_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--commercial_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--commercial_organic"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--commercial_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--commercial_organic"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--commercial_organic" data-method="GET" data-path="api/active_ingredients/{id}/commercial_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--commercial_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/commercial_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>manufacturer</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="manufacturer" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributor" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>contact_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_details" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>external_links</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="external_links" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>application_details</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="application_details" data-endpoint="GETapi-active_ingredients--id--commercial_organic" data-component="query"  hidden>
<br>

</p>
</form>


## Find active ingredient&#039;s gap items


Find gap alternatives for the agrochem product containing the active ingredient based on the active ingredient id and column values associated with the gap item provided by query params

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/similique/gap?name=repudiandae&category=qui&practices=culpa&references=qui" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/similique/gap"
);

let params = {
    "name": "repudiandae",
    "category": "qui",
    "practices": "culpa",
    "references": "qui",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/similique/gap'
params = {
  'name': 'repudiandae',
  'category': 'qui',
  'practices': 'culpa',
  'references': 'qui',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/similique/gap',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'name'=> 'repudiandae',
            'category'=> 'qui',
            'practices'=> 'culpa',
            'references'=> 'qui',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
   "total": 4,
   "data": [
     {
        "id": 299,
        "name": "Donec",
        "type": "Pest",
        "scientific_name": "Duis sodales",
        "description_pest": "Phasellus eget ante dui. Mauris risus lectus, blandit ut nunc et, egestas pharetra ante. Donec eu arcu vulputate, pulvinar felis eu, aliquet tellus. ",
        "description_impact": "Quisque velit mi, molestie ac sem sit amet, molestie porta leo.",
        "image": "ba2p43f4660c05b43fefec4c73ab25c8.jpeg",
        "references": "https://www.ipsum-lorem.org.",
        "gap": [
             {
                 "id": 11,
                 "name": "Mauris risus lectus, blandit ut nunc ",
                 "category": [
                     "Prevention",
                     "Cultural",
                     "Physical"
                 ],
                 "practices": [
                     "<h4><strong>Praesent feugiat</strong></h4><ul><li></li>Nam quis mauris leo. Nunc nec tincidunt nulla, vel facilisis mauris. <li>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</li></ul>",ate in day during dry periods.</li></ul><p>To monitor aphid populations, examine the undersides of the leaves and the bud areas for groups or colonies of aphids. Presence of ants may indicate presence of aphids. Early detection of aphids is important as they can multiply rapidly. Yellow traps are useful for monitoring the arrival of winged aphids to the crop.</p><ul><li>Look for yellowing leaves, stunted growth and honeydew on infested crops. Sooty mould may grown on the honeydew.</li><li>Look for curled, wrinkled or cupped leaves and mosaic patterns on the leaves (alternating dark and light patches) - these are symptoms of viruses that can be transmitted by the aphid</li></ul><p>Donec eu arcu vulputate, pulvinar felis eu, aliquet tellus. Donec vehicula felis turpis, sed sagittis metus ornare a.</p>"
                 ],
                 "references": [
                     "<ol><li>Maecenas quis elementum odio. Pellentesque iaculis tellus sem, ut sodales enim lobortis luctus.</li><li>Curabitur nec vulputate dolor.</li><li>Donec vehicula felis turpis, sed sagittis metus ornare a</li></ol>"
                 ],
                 "image": "61d682a9c39bc7b1ce58856c0c324d3d.jpg"
             },
             .
             .
             .
        ]
     },
     .
     .
     .
   ]
}
```
> Example response (404, No gap found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients--id--gap" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--gap"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--gap"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--gap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--gap"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--gap" data-method="GET" data-path="api/active_ingredients/{id}/gap" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--gap', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/gap</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--gap" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>practices</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="practices" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>references</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="references" data-endpoint="GETapi-active_ingredients--id--gap" data-component="query"  hidden>
<br>

</p>
</form>


## Find active ingredient&#039;s homemade organic alternatives


Find homemade organic items based on the active ingredient id and column values provided by query params

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/facere/homemade_organic?name=commodi&practices=fugit&external_links=voluptate&references=dolorem" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/facere/homemade_organic"
);

let params = {
    "name": "commodi",
    "practices": "fugit",
    "external_links": "voluptate",
    "references": "dolorem",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/facere/homemade_organic'
params = {
  'name': 'commodi',
  'practices': 'fugit',
  'external_links': 'voluptate',
  'references': 'dolorem',
}
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/facere/homemade_organic',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'name'=> 'commodi',
            'practices'=> 'fugit',
            'external_links'=> 'voluptate',
            'references'=> 'dolorem',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

"data": {
     "total": 7,
     "items": [
         {
             "id": 213,
             "name": " Quisque",
             "type": "Pest",
             "scientific_name": "meyricki caffeina",
             "description_pest": "Etiam efficitur porta quam, eget blandit lorem.",
             "description_impact": "Etiam efficitur porta quam, eget blandit lorem.<",
             "image": "6a83920453f7369c9ca64a9552ef938d.jpg",
             "references": "",
             "homemade_organic": [
                 {
                     "id": 238,
                     "name": "Vestibulum ante ipsum",
                     "practices": [
                         "<p><strong>Phasellus:</strong> Mauris a feugiat lectus. Proin nisl urna, condimentum id tortor nec, vulputate blandit nulla. Nullam consequat velit vel purus lacinia auctor..</p>"
                     ],
                     "external_links": [
                         "https://lorem.ipsum.com"
                     ],
                     "references": [
                         "<ol><li>Maecenas quis</li><li>Praesent feugiat, risus vel volutpat fermentum, diam quam viverra tortor, et convallis felis ex eget tellus</li></ol>"
                     ],
                     "image": "de7dab8868ac792dea542d662c27a43f.jpg"
                 },
                 .
                 .
                 .
             ]
         },
         .
         .
         .
     ]
}
```
> Example response (404, No homemade organic found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients--id--homemade_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id--homemade_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id--homemade_organic"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id--homemade_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id--homemade_organic"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id--homemade_organic" data-method="GET" data-path="api/active_ingredients/{id}/homemade_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id--homemade_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}/homemade_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>practices</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="practices" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>external_links</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="external_links" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>references</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="references" data-endpoint="GETapi-active_ingredients--id--homemade_organic" data-component="query"  hidden>
<br>

</p>
</form>


## Find active ingredient based on ID




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/aut" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/aut'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost:8000/api/active_ingredients/aut',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
  "data": {
     "id": 1,
     "name": "At vero eos",
     "potential_harm": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     "aquatic": 1.5,
     "aquatic_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     "bees": 72,
     "bees_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     "earthworm": 999,
     "earthworm_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     "birds": 315,
     "birds_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     "leachability": -19.89,
     "leachability_desc": "<p>Etiam efficitur porta quam, eget blandit lorem<\/p>",
     "carcinogenicity": "No",
     "mutagenicity": "No Data",
     "edc": "No",
     "reproduction": "Possible",
     "ache": "No",
     "neurotoxicant": "No",
     "who_classification": "II",
     "eu_approved": "No",
     "image": "fa2234702a9941hi1w0f2726750fb63c7e.png",
     "agrochems": [
         {
             "id": 99,
             "product_name": "Curabitur",
             "pcpb_number": "PCPB(CR)9999",
             "distributing_company": "Donec sit amet. Ltd.",
             "who_class": "II",
             "toxic": 1,
             "composition": "999g\/L as dui vitae ultricies",
             "registrant": "Aenean facilisis ultrices dui tempus lacinia",
             "type": null,
             "phi_days": 99,
             "image": "90c8539cfeef1fdbdfb6a3fff78567cf.jpg"
         },
         .
         .
         .

     ]
  }
}
```
> Example response (404, Item not found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-active_ingredients--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients--id-"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients--id-"></code></pre>
</div>
<form id="form-GETapi-active_ingredients--id-" data-method="GET" data-path="api/active_ingredients/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-active_ingredients--id-" data-component="url" required  hidden>
<br>

</p>
</form>



