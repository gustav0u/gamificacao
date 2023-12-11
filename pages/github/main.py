import requests
import json
from tqdm import tqdm

# Defina o token de acesso pessoal
token = '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'
with open("github.json") as file:
        data = json.load(file)
        """ d = [
            "882915",
            "882916",
            "882918",
            "882919",
            "882920",
            "882921",
            "882922",
            "882923",
        ] """
profiles_data = []
for profileID in tqdm(data):
# Defina o nome de usuário que você deseja buscar
    username = profileID

    # Defina a URL da API do GitHub para buscar o usuário
    url = f'https://api.github.com/users/{username}'

    # Defina os cabeçalhos da requisição, incluindo o token de acesso pessoal
    headers = {
        'Authorization': f'Token {token}',
        'Accept': 'application/vnd.github.v3+json'
    }

    # Faça a requisição GET
    response = requests.get(url, headers=headers)

    # Verifique se a requisição foi bem-sucedida (código de status 200)
    if response.status_code == 200:
        # A resposta está em formato JSON, você pode acessar os dados assim:
        data = response.json()
        result = {
            "id": data["id"],
            "name": data["name"],
            "login": data["login"],
            "public_repos": data["public_repos"],
            "bio": data["bio"],
            "avatar_url": data["avatar_url"],
            "url": data["url"]
        }
        profiles_data.append(result)
    else:
        print('Erro na requisição:', response.status_code)
json.dump(profiles_data, open("profiles_github.json", "w"), indent=4)
print(profiles_data)


