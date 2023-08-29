# Agrochem

Agrochem resource requests

## Add agrochem

<small class="badge badge-darkred">requires authentication</small>

Adds a new agrochem product item to database

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/agrochem" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"product_name":"et","distributing_company":{},"pcpb_number":{},"toxic":{},"who_class":{},"composition":{},"registrant":{},"type":{},"phi_days":{},"image":{},"active_ingredients":{},"pests_disease_weed":{}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "product_name": "et",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
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

url = 'http://localhost:8000/api/agrochem'
payload = {
    "product_name": "et",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
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
    'http://localhost:8000/api/agrochem',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'json' => [
            'product_name' => 'et',
            'distributing_company' => [],
            'pcpb_number' => [],
            'toxic' => [],
            'who_class' => [],
            'composition' => [],
            'registrant' => [],
            'type' => [],
            'phi_days' => [],
            'image' => [],
            'active_ingredients' => [],
            'pests_disease_weed' => [],
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
        "id": 1214,
        "product_name": "Vestibulum",
        "pcpb_number": "PCPB(CR)9999",
        "distributing_company": "Curabitur ac quam",
        "who_class": "II",
        "toxic": 1,
        "composition": "Meth",
        "registrant": "Vivamus vitae ligula",
        "type": null,
        "phi_days": 234,
        "image": null
    }
}
```
> Example response (501, Agrochem not created):

```json
{
    "code": 501,
    "message": "Not Created",
    "success": false
}
```
<div id="execution-results-POSTapi-agrochem" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-agrochem"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agrochem"></code></pre>
</div>
<div id="execution-error-POSTapi-agrochem" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agrochem"></code></pre>
</div>
<form id="form-POSTapi-agrochem" data-method="POST" data-path="api/agrochem" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-agrochem', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/agrochem</code></b>
</p>
<p>
<label id="auth-POSTapi-agrochem" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-agrochem" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product_name" data-endpoint="POSTapi-agrochem" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="type" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>phi_days</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phi_days" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>active_ingredients</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="active_ingredients" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pests_disease_weed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pests_disease_weed" data-endpoint="POSTapi-agrochem" data-component="body"  hidden>
<br>

</p>

</form>


## Update agrochem

<small class="badge badge-darkred">requires authentication</small>

Updates the agrochem product based on the ID

> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/agrochem/nemo" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json" \
    -d '{"product_name":"numquam","distributing_company":{},"pcpb_number":{},"toxic":{},"who_class":{},"composition":{},"registrant":{},"type":{},"phi_days":{},"image":{},"active_ingredients":{},"pests_disease_weed":{}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/nemo"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};

let body = {
    "product_name": "numquam",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
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

url = 'http://localhost:8000/api/agrochem/nemo'
payload = {
    "product_name": "numquam",
    "distributing_company": {},
    "pcpb_number": {},
    "toxic": {},
    "who_class": {},
    "composition": {},
    "registrant": {},
    "type": {},
    "phi_days": {},
    "image": {},
    "active_ingredients": {},
    "pests_disease_weed": {}
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
    'http://localhost:8000/api/agrochem/nemo',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'json' => [
            'product_name' => 'numquam',
            'distributing_company' => [],
            'pcpb_number' => [],
            'toxic' => [],
            'who_class' => [],
            'composition' => [],
            'registrant' => [],
            'type' => [],
            'phi_days' => [],
            'image' => [],
            'active_ingredients' => [],
            'pests_disease_weed' => [],
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
        "id": 1214,
        "product_name": "Vestibulum Update",
        "pcpb_number": "PCPB(CR)9999",
        "distributing_company": "Curabitur ac quam nullo",
        "who_class": "II",
        "toxic": 1,
        "composition": "Meth",
        "registrant": "Vivamus vitae ligula",
        "type": null,
        "phi_days": 234,
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
<div id="execution-results-PUTapi-agrochem--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-agrochem--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-agrochem--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-agrochem--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-agrochem--id-"></code></pre>
</div>
<form id="form-PUTapi-agrochem--id-" data-method="PUT" data-path="api/agrochem/{id}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-agrochem--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/agrochem/{id}</code></b>
</p>
<p>
<label id="auth-PUTapi-agrochem--id-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-agrochem--id-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-agrochem--id-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product_name" data-endpoint="PUTapi-agrochem--id-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="type" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>phi_days</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phi_days" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>active_ingredients</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="active_ingredients" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>pests_disease_weed</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pests_disease_weed" data-endpoint="PUTapi-agrochem--id-" data-component="body"  hidden>
<br>

</p>

</form>


## Delete agrochem


Deletes an agrochem product based on the id value

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/agrochem/assumenda" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/assumenda"
);

let headers = {
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

url = 'http://localhost:8000/api/agrochem/assumenda'
headers = {
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
    'http://localhost:8000/api/agrochem/assumenda',
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
<div id="execution-results-DELETEapi-agrochem--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-agrochem--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-agrochem--id-"></code></pre>
</div>
<div id="execution-error-DELETEapi-agrochem--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-agrochem--id-"></code></pre>
</div>
<form id="form-DELETEapi-agrochem--id-" data-method="DELETE" data-path="api/agrochem/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-agrochem--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/agrochem/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-agrochem--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Get all agrochem products


Get all agrochem products

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem?order_column=culpa&order_direction=saepe&per_page=voluptate" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem"
);

let params = {
    "order_column": "culpa",
    "order_direction": "saepe",
    "per_page": "voluptate",
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

url = 'http://localhost:8000/api/agrochem'
params = {
  'order_column': 'culpa',
  'order_direction': 'saepe',
  'per_page': 'voluptate',
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
    'http://localhost:8000/api/agrochem',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'order_column'=> 'culpa',
            'order_direction'=> 'saepe',
            'per_page'=> 'voluptate',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json

{
   "data": [{
         "id": 1999,
         "product_name": "Morbi fringilla",
         "pcpb_number": "PCPB(CR)9999",
         "distributing_company": "Sed elementum",
         "toxic": 1,
         "who_class": "II",
         "composition": "200g/L as paraquat ion",
         "registrant": "Nam eu erat rhoncus",
         "type": null,
         "phi_days": null,
         "crops": [
             {
                 "id": 1,
                 "name": "Donec",
                 "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
                 "pests_disease_weed": [
                     {
                         "id": 320,
                         "name": "Proin vulputate",
                         "type": "Disease",
                         "scientific_name": "Mauris elementum",
                         "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
                         "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
                         "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
                         "references": "https://en.m.lorem.org/wiki"
                     },
                     .
                     .
                     .
                 ],
                 "agrochems": [
                     {
                         "id": 1123,
                         "product_name": "Ut maximus",
                         "pcpb_number": "PCPB(CR)9999",
                         "distributing_company": "Mauris a viv",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
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
         "pests_disease_weed": [
             {
                 "id": 484,
                 "name": "Mmaximus",
                 "type": "Weed",
                 "scientific_name": null,
                 "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
                 "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
                 "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                 "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
             },
             .
             .
             .
         ],
         "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
         "active_ingredients": [
             {
                 "id": 1,
                 "name": "Proin feugiat",
                 "potential_harm": null,
                 "aquatic": 1.2,
                 "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
                 "bees": 72,
                 "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
                 "earthworm": 999,
                 "earthworm_desc": null,
                 "birds": 35,
                 "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
                 "leachability": -6.89,
                 "leachability_desc": "<p>Mauris elementum ac lectus </p>",
                 "carcinogenicity": "No",
                 "mutagenicity": "No Data",
                 "edc": "No",
                 "reproduction": "Possible",
                 "ache": "No",
                 "neurotoxicant": "No",
                 "who_classification": "II",
                 "eu_approved": "No",
                 "image": "ca211702a9941c4e0f2945750fb63c7e.png",
                 "agrochems": [
                     {
                         "id": 1,
                         "product_name": "Curabitun",
                         "pcpb_number": "PCPB(CR)9029",
                         "distributing_company": "Cras sed neque.",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
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
     },
     .
     .
     .
   ],
   "links": {
         "first": "https://api.safeinputs.koan.co.ke/api/agrochem?page=1",
         "last": "https://api.safeinputs.koan.co.ke/api/agrochem?page=8",
         "prev": null,
         "next": "https://api.safeinputs.koan.co.ke/api/agrochem?page=2"
   },
   "meta": {
         "current_page": 1,
         "from": 1,
         "last_page": 8,
         "path": "https://api.safeinputs.koan.co.ke/api/agrochem",
         "per_page": "16",
         "to": 16,
         "total": 113
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
<div id="execution-results-GETapi-agrochem" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem"></code></pre>
</div>
<form id="form-GETapi-agrochem" data-method="GET" data-path="api/agrochem" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-agrochem" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="per_page" data-endpoint="GETapi-agrochem" data-component="query"  hidden>
<br>

</p>
</form>


## Search Agrochem Products


Performs search on agrochem product records based on query parameter values
Query parameter keys are the columns

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/filter/similique?product_name=minima&pcpb_number=sit&distributing_company=provident&composition=tenetur&registrant=tempore&toxic=temporibus&who_class=fugit" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/filter/similique"
);

let params = {
    "product_name": "minima",
    "pcpb_number": "sit",
    "distributing_company": "provident",
    "composition": "tenetur",
    "registrant": "tempore",
    "toxic": "temporibus",
    "who_class": "fugit",
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

url = 'http://localhost:8000/api/agrochem/filter/similique'
params = {
  'product_name': 'minima',
  'pcpb_number': 'sit',
  'distributing_company': 'provident',
  'composition': 'tenetur',
  'registrant': 'tempore',
  'toxic': 'temporibus',
  'who_class': 'fugit',
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
    'http://localhost:8000/api/agrochem/filter/similique',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_name'=> 'minima',
            'pcpb_number'=> 'sit',
            'distributing_company'=> 'provident',
            'composition'=> 'tenetur',
            'registrant'=> 'tempore',
            'toxic'=> 'temporibus',
            'who_class'=> 'fugit',
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
             "id": 1999,
             "product_name": "Morbi fringilla",
             "pcpb_number": "PCPB(CR)9999",
             "distributing_company": "Sed elementum",
             "toxic": 1,
             "who_class": "II",
             "composition": "200g/L as paraquat ion",
             "registrant": "Nam eu erat rhoncus",
             "type": null,
             "phi_days": null,
             "crops": [
                 {
                     "id": 1,
                     "name": "Donec",
                     "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
                     "pests_disease_weed": [
                         {
                             "id": 320,
                             "name": "Proin vulputate",
                             "type": "Disease",
                             "scientific_name": "Mauris elementum",
                             "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
                             "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
                             "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
                             "references": "https://en.m.lorem.org/wiki"
                         },
                         .
                         .
                         .
                     ],
                     "agrochems": [
                         {
                             "id": 1123,
                             "product_name": "Ut maximus",
                             "pcpb_number": "PCPB(CR)9999",
                             "distributing_company": "Mauris a viv",
                             "who_class": "II",
                             "toxic": 1,
                             "composition": "200g/L as paraquat ion",
                             "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
                             "type": null,
                             "phi_days": null,
                             "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
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
             "pests_disease_weed": [
                 {
                     "id": 484,
                     "name": "Mmaximus",
                     "type": "Weed",
                     "scientific_name": null,
                     "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
                     "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
                     "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                     "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
                 },
                 .
                 .
                 .
             ],
             "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
             "active_ingredients": [
                 {
                     "id": 1,
                     "name": "Proin feugiat",
                     "potential_harm": null,
                     "aquatic": 1.2,
                     "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
                     "bees": 72,
                     "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
                     "earthworm": 999,
                     "earthworm_desc": null,
                     "birds": 35,
                     "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
                     "leachability": -6.89,
                     "leachability_desc": "<p>Mauris elementum ac lectus </p>",
                     "carcinogenicity": "No",
                     "mutagenicity": "No Data",
                     "edc": "No",
                     "reproduction": "Possible",
                     "ache": "No",
                     "neurotoxicant": "No",
                     "who_classification": "II",
                     "eu_approved": "No",
                     "image": "ca211702a9941c4e0f2945750fb63c7e.png",
                     "agrochems": [
                         {
                             "id": 1,
                             "product_name": "Curabitun",
                             "pcpb_number": "PCPB(CR)9029",
                             "distributing_company": "Cras sed neque.",
                             "who_class": "II",
                             "toxic": 1,
                             "composition": "200g/L as paraquat ion",
                             "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
                             "type": null,
                             "phi_days": null,
                             "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
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
         },
     ],
     "links": {
         "first": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=1",
         "last": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=8",
         "prev": null,
         "next": "https://api.safeinputs.koan.co.ke/api/agrochem/filter?page=2"
     },
     "meta": {
         "current_page": 1,
         "from": 1,
         "last_page": 8,
         "path": "https://api.safeinputs.koan.co.ke/api/agrochem/filter",
         "per_page": "16",
         "to": 16,
         "total": 114
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
<div id="execution-results-GETapi-agrochem-filter--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-filter--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-filter--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-filter--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-filter--search_value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-filter--search_value--" data-method="GET" data-path="api/agrochem/filter/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-filter--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/filter/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-agrochem-filter--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
</form>


## Datatable


Implementation for Datatables API to populate table with agrochem records

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/datatable" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/datatable"
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

url = 'http://localhost:8000/api/agrochem/datatable'
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
    'http://localhost:8000/api/agrochem/datatable',
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
     "current_page": 1,
     "data": [
         {
             "id": 1999,
             "product_name": "Morbi fringilla",
             "pcpb_number": "PCPB(CR)9999",
             "distributing_company": "Sed elementum",
             "toxic": 1,
             "who_class": "II",
             "composition": "200g/L as paraquat ion",
             "registrant": "Nam eu erat rhoncus",
             "type": "tocix",
             "phi_days": 234,
             "image": "7b77642dc9863c22194b26a21da24614.jpg"
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=1",
     "from": 1,
     "last_page": 8,
     "last_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=8",
     "next_page_url": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable?page=2",
     "path": "https://api.safeinputs.koan.co.ke/api/agrochem/datatable",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 114
}
```
<div id="execution-results-GETapi-agrochem-datatable" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-datatable"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-datatable"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-datatable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-datatable"></code></pre>
</div>
<form id="form-GETapi-agrochem-datatable" data-method="GET" data-path="api/agrochem/datatable" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-datatable', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/datatable</code></b>
</p>
</form>


## Get agrochem names


Retrieve all agrochem product names

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/names" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/names"
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

url = 'http://localhost:8000/api/agrochem/names'
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
    'http://localhost:8000/api/agrochem/names',
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
   "message": "113 Items found",
   "success": true,
   "data": [
         {
             "id": 109,
             "product_name": "Curabitur"
         },
         {
             "id": 96,
             "product_name": "Vivamus"
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
<div id="execution-results-GETapi-agrochem-names" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-names"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-names"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-names" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-names"></code></pre>
</div>
<form id="form-GETapi-agrochem-names" data-method="GET" data-path="api/agrochem/names" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-names', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/names</code></b>
</p>
</form>


## Get agrochem names - with image


Performs search on agrochem product records based on query parameter values</br>
Returns only name, id and image

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/summary/names/asperiores?per_page=1&order_direction=desc&order_column=id%2A&product_name=porro&pcpb_number=sed&distributing_company=facere&composition=dolor&registrant=in&toxic=nihil&who_class=ab" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/summary/names/asperiores"
);

let params = {
    "per_page": "1",
    "order_direction": "desc",
    "order_column": "id*",
    "product_name": "porro",
    "pcpb_number": "sed",
    "distributing_company": "facere",
    "composition": "dolor",
    "registrant": "in",
    "toxic": "nihil",
    "who_class": "ab",
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

url = 'http://localhost:8000/api/agrochem/summary/names/asperiores'
params = {
  'per_page': '1',
  'order_direction': 'desc',
  'order_column': 'id*',
  'product_name': 'porro',
  'pcpb_number': 'sed',
  'distributing_company': 'facere',
  'composition': 'dolor',
  'registrant': 'in',
  'toxic': 'nihil',
  'who_class': 'ab',
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
    'http://localhost:8000/api/agrochem/summary/names/asperiores',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'per_page'=> '1',
            'order_direction'=> 'desc',
            'order_column'=> 'id*',
            'product_name'=> 'porro',
            'pcpb_number'=> 'sed',
            'distributing_company'=> 'facere',
            'composition'=> 'dolor',
            'registrant'=> 'in',
            'toxic'=> 'nihil',
            'who_class'=> 'ab',
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
             "id": 115,
             "product_name": "Dummy",
             "image": "1a7f07ce0c95d1aa64e3b0522ec69a21.jpg"
         },
         .
         .
         .
     ],
     "first_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=1",
     "from": 1,
     "last_page": 8,
     "last_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=8",
     "next_page_url": "https://api.saferinputs.com/api/agrochem/summary/names?page=2",
     "path": "https://api.saferinputs.com/api/agrochem/summary/names",
     "per_page": "16",
     "prev_page_url": null,
     "to": 16,
     "total": 114
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
<div id="execution-results-GETapi-agrochem-summary-names--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-summary-names--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-summary-names--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-summary-names--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-summary-names--search_value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-summary-names--search_value--" data-method="GET" data-path="api/agrochem/summary/names/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-summary-names--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/summary/names/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_direction</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_direction" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
asc | desc
</p>
<p>
<b><code>order_column</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_column" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
*use query parameter names below*
</p>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-agrochem-summary-names--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
</form>


## Get totals of agrochem products


Performs aggregations on agrochem records based on query parameter values </br>
Returns total

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/summary/count/enim?product_name=quia&pcpb_number=voluptatibus&distributing_company=odit&composition=maiores&registrant=dolorem&toxic=alias&who_class=vero" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/summary/count/enim"
);

let params = {
    "product_name": "quia",
    "pcpb_number": "voluptatibus",
    "distributing_company": "odit",
    "composition": "maiores",
    "registrant": "dolorem",
    "toxic": "alias",
    "who_class": "vero",
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

url = 'http://localhost:8000/api/agrochem/summary/count/enim'
params = {
  'product_name': 'quia',
  'pcpb_number': 'voluptatibus',
  'distributing_company': 'odit',
  'composition': 'maiores',
  'registrant': 'dolorem',
  'toxic': 'alias',
  'who_class': 'vero',
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
    'http://localhost:8000/api/agrochem/summary/count/enim',
    [
        'headers' => [
            'Access-Control-Allow-Origin' => '*',
            'Accept' => 'application/json',
        ],
        'query' => [
            'product_name'=> 'quia',
            'pcpb_number'=> 'voluptatibus',
            'distributing_company'=> 'odit',
            'composition'=> 'maiores',
            'registrant'=> 'dolorem',
            'toxic'=> 'alias',
            'who_class'=> 'vero',
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
<div id="execution-results-GETapi-agrochem-summary-count--search_value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-summary-count--search_value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-summary-count--search_value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-summary-count--search_value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-summary-count--search_value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-summary-count--search_value--" data-method="GET" data-path="api/agrochem/summary/count/{search_value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-summary-count--search_value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/summary/count/{search_value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>search_value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search_value" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="url"  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>product_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="product_name" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>pcpb_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pcpb_number" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>distributing_company</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="distributing_company" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>composition</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="composition" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>registrant</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="registrant" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>toxic</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="toxic" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>
true | false
</p>
<p>
<b><code>who_class</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="who_class" data-endpoint="GETapi-agrochem-summary-count--search_value--" data-component="query"  hidden>
<br>
IA | IB | II | III | U
</p>
</form>


## Find agrochem active ingredients


Find the agrochem product's active ingredients based on the id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/atque/active_ingredients" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/atque/active_ingredients"
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

url = 'http://localhost:8000/api/agrochem/atque/active_ingredients'
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
    'http://localhost:8000/api/agrochem/atque/active_ingredients',
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
         "id": 913,
         "product_name": "Vivamus",
         "pcpb_number": "PCPB(CR)9970",
         "distributing_company": "Nunc rhoncus blandit mi sed dapibus",
         "who_class": "II",
         "toxic": 1,
         "composition": "Mauris vel magna",
         "registrant": "<p>Aenean sit amet sapien nulla. Nullam efficitur auctor mi blandit malesuada.</p>",
         "type": null,
         "phi_days": 14,
         "image": "7b77642dc98e2122194b26a21dd2c614.jpeg",
         "active_ingredients": [
             {
                 "id": 1215,
                 "name": "Proin feugiat",
                 "potential_harm": null,
                 "aquatic": 1.2,
                 "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
                 "bees": 72,
                 "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
                 "earthworm": 999,
                 "earthworm_desc": null,
                 "birds": 35,
                 "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
                 "leachability": -6.89,
                 "leachability_desc": "<p>Mauris elementum ac lectus </p>",
                 "carcinogenicity": "No",
                 "mutagenicity": "No Data",
                 "edc": "No",
                 "reproduction": "Possible",
                 "ache": "No",
                 "neurotoxicant": "No",
                 "who_classification": "II",    "eu_approved": "No",
                 "image "ca211702a9941c4e0f2945750fb63c7e.png",
             },
             .
             .
             .
         ]
   }
}
```
> Example response (404, No Active Ingredients):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-agrochem--id--active_ingredients" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--active_ingredients"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--active_ingredients"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--active_ingredients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--active_ingredients"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--active_ingredients" data-method="GET" data-path="api/agrochem/{id}/active_ingredients" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--active_ingredients', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/active_ingredients</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--active_ingredients" data-component="url" required  hidden>
<br>

</p>
</form>


## Find agrochem commercial organic alternatives


Find commercial organic alternative products to handle specific pests based on the agrochem product id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/sunt/commercial_organic" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/sunt/commercial_organic"
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

url = 'http://localhost:8000/api/agrochem/sunt/commercial_organic'
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
    'http://localhost:8000/api/agrochem/sunt/commercial_organic',
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
   "total": 4,
   "data": [
         {
             "id": 9,
             "name": "Morbi",
             "type": "Pest",
             "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
             "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
             "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
             "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
             "references": "https://www.donec-erat.org/",
             "commercial_organic": [
                 {
                     "id": 4,
                     "name": "Phasellus",
                     "pcpb_number": "PCPB(CR)9999",
                     "manufacturer": "Nulla ex",
                     "distributor": "Nulla ex",
                     "category": "Biocontrol",
                     "contact_details": "Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna. Suspendisse at tellus lorem.",
                     "external_links": [
                         "<p>www.justo-etiam.com</p>",
                     ],
                     "application_details": [
                         "Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec,"
                     ],
                     "image": "1a240c031237a16a16291e9643f3ed8.jpg"
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
> Example response (404, No Commercial Organic Found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-agrochem--id--commercial_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--commercial_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--commercial_organic"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--commercial_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--commercial_organic"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--commercial_organic" data-method="GET" data-path="api/agrochem/{id}/commercial_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--commercial_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/commercial_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--commercial_organic" data-component="url" required  hidden>
<br>

</p>
</form>


## Find agrochem crops


Find crops associated with the agrochem product based on its id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/qui/crops" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/qui/crops"
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

url = 'http://localhost:8000/api/agrochem/qui/crops'
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
    'http://localhost:8000/api/agrochem/qui/crops',
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
         "id": 1999,
         "product_name": "Morbi fringilla",
         "pcpb_number": "PCPB(CR)9999",
         "distributing_company": "Sed elementum",
         "toxic": 1,
         "who_class": "II",
         "composition": "200g/L as paraquat ion",
         "registrant": "Nam eu erat rhoncus",
         "type": null,
         "phi_days": null,
         "crops": [
             {
                 "id": 1,
                 "name": "Donec",
                 "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
             },
             .
             .
             .
         ]
   }
}
```
> Example response (404, No Crops Found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-agrochem--id--crops" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--crops"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--crops"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--crops" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--crops"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--crops" data-method="GET" data-path="api/agrochem/{id}/crops" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--crops', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/crops</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--crops" data-component="url" required  hidden>
<br>

</p>
</form>


## Find agrochem homemade organic alternatives


Find homemade organic alternatives to handle specific pests based on the agrochem product id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/sit/homemade_organic" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/sit/homemade_organic"
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

url = 'http://localhost:8000/api/agrochem/sit/homemade_organic'
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
    'http://localhost:8000/api/agrochem/sit/homemade_organic',
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
   "total": 2,
   "data": [
         {
             "id": 9,
             "name": "Morbi",
             "type": "Pest",
             "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
             "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
             "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
             "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
             "references": "https://www.donec-erat.org/",
             "homemade_organic": [
                 {
                     "id": 322,
                     "name": "Proin feugiat massa quam",
                     "practices": [
                         "<p>Nam eu erat rhoncus, sollicitudin arcu eu, consequat neque. Nulla ex velit, ullamcorper quis ante vel, maximus tincidunt eros. Vestibulum auctor ante sit amet nisi pulvinar ultricies.</p>",
                         .
                         .
                         .
                     ],
                     "external_links": [
                         "<p>1.Duis convallis, elit eget posuere vulputate, nunc dui</p>",
                         "<p>2. https://www.ultrices-velit.org/</p>",
                         .
                         .
                         .
                     ],
                     "references": [
                         "https://www.ultrices-velit.org",
                         .
                         .
                         .
                     ],
                     "image": "55a34637157a757f60003f86179221a1.jpg"
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
> Example response (404, No Homemade Organic):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-agrochem--id--homemade_organic" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--homemade_organic"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--homemade_organic"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--homemade_organic" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--homemade_organic"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--homemade_organic" data-method="GET" data-path="api/agrochem/{id}/homemade_organic" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--homemade_organic', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/homemade_organic</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--homemade_organic" data-component="url" required  hidden>
<br>

</p>
</form>


## Find agrochem GAP alternatives


Find alternative good agricultural practices (GAP) to handle specific pests based on the agrochem product id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/sequi/gap" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/sequi/gap"
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

url = 'http://localhost:8000/api/agrochem/sequi/gap'
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
    'http://localhost:8000/api/agrochem/sequi/gap',
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
     "total": 2,
     "data": [
         {
             "id": 9,
             "name": "Morbi",
             "type": "Pest",
             "scientific_name": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla fringilla egestas feugiat. Cras sed neque elementum, facilisis",
             "description_pest": "Proin interdum, ligula nec ultricies suscipit, ipsum ipsum pretium justo, vel blandit lorem tortor ac est",
             "description_impact": "Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue .",
             "image": "ba2e5bf4660c05b43d2123c4c73ab25c8.jpeg",
             "references": "https://www.donec-erat.org/",
             "gap": [
                 {
                     "id": 23,
                     "name": "Mauris a viverra",
                     "category": [
                         "Cultural",
                         "Physical",
                         "Prevention"
                     ],
                     "practices": [
                         "<h4><strong>Donec fringilla</strong></h4><ol><li>Nam eu erat rhoncus, sollicitudin arcu eu, consequat neque. Nulla ex velit, ullamcorper qu</li></ol>",
                     ],
                     "references": [
                         "<ol><li><a href=\"https://www.nisi-convallis.org/\">https://www.nisi-convallis.org/</a></li></ol>"
                     ],
                     "image": "23456803e306dd09538a811ed4ee067d.jpg"
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
> Example response (404, No Homemade Organic):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-agrochem--id--gap" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--gap"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--gap"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--gap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--gap"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--gap" data-method="GET" data-path="api/agrochem/{id}/gap" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--gap', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/gap</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--gap" data-component="url" required  hidden>
<br>

</p>
</form>


## Find agrochem pests, diseases, weeds


Find pests, diseases, weeds controlled by the  agrochem product based on the agrochem product's id

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/magnam/pdw" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/magnam/pdw"
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

url = 'http://localhost:8000/api/agrochem/magnam/pdw'
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
    'http://localhost:8000/api/agrochem/magnam/pdw',
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
         "id": 913,
         "product_name": "Vivamus",
         "pcpb_number": "PCPB(CR)9970",
         "distributing_company": "Nunc rhoncus blandit mi sed dapibus",
         "who_class": "II",
         "toxic": 1,
         "composition": "Mauris vel magna",
         "registrant": "<p>Aenean sit amet sapien nulla. Nullam efficitur auctor mi blandit malesuada.</p>",
         "type": null,
         "phi_days": 14,
         "image": "7b77642dc98e2122194b26a21dd2c614.jpeg",
         "pests_disease_weed": [
             {
                 "id": 484,
                 "name": "Mmaximus",
                 "type": "Weed",
                 "scientific_name": null,
                 "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
                 "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
                 "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                 "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
             },
             .
             .
             .
         ],
   }
}
```
> Example response (404, No Pests, Diseases, Weeds Found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-agrochem--id--pdw" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id--pdw"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id--pdw"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id--pdw" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id--pdw"></code></pre>
</div>
<form id="form-GETapi-agrochem--id--pdw" data-method="GET" data-path="api/agrochem/{id}/pdw" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id--pdw', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}/pdw</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id--pdw" data-component="url" required  hidden>
<br>

</p>
</form>


## Find agrochem based on ID


Find agrochem product based on given ID.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/et" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/et"
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

url = 'http://localhost:8000/api/agrochem/et'
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
    'http://localhost:8000/api/agrochem/et',
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
         "id": 1999,
         "product_name": "Morbi fringilla",
         "pcpb_number": "PCPB(CR)9999",
         "distributing_company": "Sed elementum",
         "toxic": 1,
         "who_class": "II",
         "composition": "200g/L as paraquat ion",
         "registrant": "Nam eu erat rhoncus",
         "type": null,
         "phi_days": null,
         "crops": [
             {
                 "id": 1,
                 "name": "Donec",
                 "image": "48898239dde0fa10c69a3a9673fd230c.jpg",
                 "pests_disease_weed": [
                     {
                         "id": 320,
                         "name": "Proin vulputate",
                         "type": "Disease",
                         "scientific_name": "Mauris elementum",
                         "description_pest": "Morbi eget odio tristique, venenatis metus eu, lobortis purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas",
                         "description_impact": "Donec fringilla enim ut convallis faucibus. Ut tempus turpis eget eros iaculis rhoncus. Cras aliquam nulla vitae felis ullamcorper ultrices.",
                         "image": "a53773d8c98ecedd1c2043eb1203c80a.jpg",
                         "references": "https://en.m.lorem.org/wiki"
                     },
                     .
                     .
                     .
                 ],
                 "agrochems": [
                     {
                         "id": 1123,
                         "product_name": "Ut maximus",
                         "pcpb_number": "PCPB(CR)9999",
                         "distributing_company": "Mauris a viv",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Ut maximus mauris quis nisl aliquam vulputate. Phasellus condimentum nulla",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8cd35feef1fdbdfb6a3fff78567cf.jpg"
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
         "pests_disease_weed": [
             {
                 "id": 484,
                 "name": "Mmaximus",
                 "type": "Weed",
                 "scientific_name": null,
                 "description_pest": "<p>Morbi fringilla fringilla odio vitae congue. Donec consectetur nulla ac congue congue. Fusce ac libero vel neque aliquet imperdiet a et nisi.</p>",
                 "description_impact": "<p><strong>Sed elementum</strong></p><p>Aliquam ut enim in eros blandit viverra maximus non sem. Sed tempor iaculis nunc, sed porta magna tempor ut.</p>",
                 "image": "d0b20da345ff656c7a0cf3b7f8980040.jpg",
                 "references": "<ol><li><a href=\"https://www.upsim.org/lonet\">"
             },
             .
             .
             .
         ],
         "image": "90c8539cfeef1f2345b6a3fff78567cf.jpg",
         "active_ingredients": [
             {
                 "id": 1,
                 "name": "Proin feugiat",
                 "potential_harm": null,
                 "aquatic": 1.2,
                 "aquatic_desc": "<p>Aenean ut eleifend lectus. Proin vulputate mauris vel est tempor, at finibus neque accumsan.</p>",
                 "bees": 72,
                 "bees_desc": "<p> Mauris a viverra tellus, sit amet mattis nisi. Sed quam turpis, semper a neque ut, ultricies aliquam</p>",
                 "earthworm": 999,
                 "earthworm_desc": null,
                 "birds": 35,
                 "birds_desc": "<p>Ut nec velit id ex viverra faucibus. Nulla ac convallis sem. Vivamus velit nibh, scelerisque et interdum nec, facilisis sit amet magna.</p>",
                 "leachability": -6.89,
                 "leachability_desc": "<p>Mauris elementum ac lectus </p>",
                 "carcinogenicity": "No",
                 "mutagenicity": "No Data",
                 "edc": "No",
                 "reproduction": "Possible",
                 "ache": "No",
                 "neurotoxicant": "No",
                 "who_classification": "II",
                 "eu_approved": "No",
                 "image": "ca211702a9941c4e0f2945750fb63c7e.png",
                 "agrochems": [
                     {
                         "id": 1,
                         "product_name": "Curabitun",
                         "pcpb_number": "PCPB(CR)9029",
                         "distributing_company": "Cras sed neque.",
                         "who_class": "II",
                         "toxic": 1,
                         "composition": "200g/L as paraquat ion",
                         "registrant": "Cras eget feugiat metus. Integer ultricies eu felis et laoreet..",
                         "type": null,
                         "phi_days": null,
                         "image": "90c8e234feef1fdbdfb6a3fff78567cf.jpg"
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
}
```
> Example response (404, Agrochem not found):

```json
{
    "code": 404,
    "message": "Item not found",
    "success": false
}
```
<div id="execution-results-GETapi-agrochem--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem--id-"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem--id-"></code></pre>
</div>
<form id="form-GETapi-agrochem--id-" data-method="GET" data-path="api/agrochem/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-agrochem--id-" data-component="url" required  hidden>
<br>

</p>
</form>



