from fastapi import FastAPI, HTTPException, Depends, Request

messages = {
    "GET": "A classic verb, a cool kid, but not the only. Used to retrieve resources from servers with ease.",
    "POST": "A verb with a flair for creation, a real go-getter. Use it to submit data to servers and make new resources.",
    "PATCH": "A verb that's all about patching things up, a real peacemaker. Use it to make partial updates to existing resources, and keep things running smoothly.",
    "DELETE": "A verb with a destructive streak, a real rebel. Use it to wipe out resources on servers like a boss.",
    "OPTIONS": "A verb that's all about exploring options, a real adventurer. Use it to retrieve the available methods and communication options for a resource.",
    "HEAD": "A verb that's all about getting ahead, a real leader. Use it to retrieve the headers of a resource, without getting the whole thing.",
    "PUT": [
            "securinets{learning_more_about_http_verbs_everyday_:)}",
            "A verb that's all about the update, a real transformer. Use it to replace or update existing resources on servers."
    ],
}

error = {
    "header": "is_member",
    "message": "Access Denied - Not a Securinets ISI member"
}


app = FastAPI()


async def check_header(request: Request):
    if request.headers.get('is_member') != "true":
        raise HTTPException(
            status_code=400, detail=error
        )
    return True


@app.put("/")
async def flag_put(header_check: bool = Depends(check_header)):
    return {"flag": messages["PUT"]}


@app.get("/")
async def flag_get(header_check: bool = Depends(check_header)):
    return {"message": messages["GET"]}


@app.post("/")
async def flag_post(header_check: bool = Depends(check_header)):
    return {"message": messages["POST"]}


@app.delete("/")
async def flag_delete(header_check: bool = Depends(check_header)):
    return {"message": messages["DELETE"]}


@app.head("/")
async def flag_delete(header_check: bool = Depends(check_header)):
    return {"message": messages["HEAD"]}


@app.options("/")
async def flag_delete(header_check: bool = Depends(check_header)):
    return {"message": messages["OPTIONS"]}


@app.patch("/")
async def flag_delete(header_check: bool = Depends(check_header)):
    return {"message": messages["PATCH"]}
