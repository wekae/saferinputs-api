# Endpoints


## api/active_ingredients/{id}/image




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/active_ingredients/velit/image" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/velit/image"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/active_ingredients/velit/image'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/active_ingredients/velit/image',
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


<div id="execution-results-POSTapi-active_ingredients--id--image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-active_ingredients--id--image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-active_ingredients--id--image"></code></pre>
</div>
<div id="execution-error-POSTapi-active_ingredients--id--image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-active_ingredients--id--image"></code></pre>
</div>
<form id="form-POSTapi-active_ingredients--id--image" data-method="POST" data-path="api/active_ingredients/{id}/image" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-active_ingredients--id--image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/active_ingredients/{id}/image</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-active_ingredients--id--image" data-component="url" required  hidden>
<br>

</p>
</form>


## api/agrochem/{id}/image




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/agrochem/ut/image" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/ut/image"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/agrochem/ut/image'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/agrochem/ut/image',
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


<div id="execution-results-POSTapi-agrochem--id--image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-agrochem--id--image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agrochem--id--image"></code></pre>
</div>
<div id="execution-error-POSTapi-agrochem--id--image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agrochem--id--image"></code></pre>
</div>
<form id="form-POSTapi-agrochem--id--image" data-method="POST" data-path="api/agrochem/{id}/image" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-agrochem--id--image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/agrochem/{id}/image</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-agrochem--id--image" data-component="url" required  hidden>
<br>

</p>
</form>


## api/commercial_organic/{id}/image




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/commercial_organic/dolorem/image" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/dolorem/image"
);

let headers = {
    "Content-Type": "application/json",
    "Access-Control-Allow-Origin": "*",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```

```python
import requests
import json

url = 'http://localhost:8000/api/commercial_organic/dolorem/image'
headers = {
  'Content-Type': 'application/json',
  'Access-Control-Allow-Origin': '*',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers)
response.json()
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://localhost:8000/api/commercial_organic/dolorem/image',
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


<div id="execution-results-POSTapi-commercial_organic--id--image" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-commercial_organic--id--image"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-commercial_organic--id--image"></code></pre>
</div>
<div id="execution-error-POSTapi-commercial_organic--id--image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-commercial_organic--id--image"></code></pre>
</div>
<form id="form-POSTapi-commercial_organic--id--image" data-method="POST" data-path="api/commercial_organic/{id}/image" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-commercial_organic--id--image', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/commercial_organic/{id}/image</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-commercial_organic--id--image" data-component="url" required  hidden>
<br>

</p>
</form>


## api/active_ingredients/search/{value?}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/active_ingredients/search/minima" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/active_ingredients/search/minima"
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

url = 'http://localhost:8000/api/active_ingredients/search/minima'
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
    'http://localhost:8000/api/active_ingredients/search/minima',
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```
<div id="execution-results-GETapi-active_ingredients-search--value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-active_ingredients-search--value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-active_ingredients-search--value--"></code></pre>
</div>
<div id="execution-error-GETapi-active_ingredients-search--value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-active_ingredients-search--value--"></code></pre>
</div>
<form id="form-GETapi-active_ingredients-search--value--" data-method="GET" data-path="api/active_ingredients/search/{value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-active_ingredients-search--value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/active_ingredients/search/{value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="value" data-endpoint="GETapi-active_ingredients-search--value--" data-component="url"  hidden>
<br>

</p>
</form>


## api/agrochem/search/{value?}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/agrochem/search/ex" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/agrochem/search/ex"
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

url = 'http://localhost:8000/api/agrochem/search/ex'
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
    'http://localhost:8000/api/agrochem/search/ex',
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```
<div id="execution-results-GETapi-agrochem-search--value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-agrochem-search--value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agrochem-search--value--"></code></pre>
</div>
<div id="execution-error-GETapi-agrochem-search--value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agrochem-search--value--"></code></pre>
</div>
<form id="form-GETapi-agrochem-search--value--" data-method="GET" data-path="api/agrochem/search/{value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-agrochem-search--value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/agrochem/search/{value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="value" data-endpoint="GETapi-agrochem-search--value--" data-component="url"  hidden>
<br>

</p>
</form>


## api/commercial_organic/search/{value?}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/commercial_organic/search/velit" \
    -H "Content-Type: application/json" \
    -H "Access-Control-Allow-Origin: *" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/commercial_organic/search/velit"
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

url = 'http://localhost:8000/api/commercial_organic/search/velit'
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
    'http://localhost:8000/api/commercial_organic/search/velit',
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```
<div id="execution-results-GETapi-commercial_organic-search--value--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-commercial_organic-search--value--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-commercial_organic-search--value--"></code></pre>
</div>
<div id="execution-error-GETapi-commercial_organic-search--value--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-commercial_organic-search--value--"></code></pre>
</div>
<form id="form-GETapi-commercial_organic-search--value--" data-method="GET" data-path="api/commercial_organic/search/{value?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Access-Control-Allow-Origin":"*","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-commercial_organic-search--value--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/commercial_organic/search/{value?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="value" data-endpoint="GETapi-commercial_organic-search--value--" data-component="url"  hidden>
<br>

</p>
</form>



