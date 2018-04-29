from lib.core.enums import PRIORITY
def tamper(payload, **kwargs):
  retVal = "user_"+payload
  file("payload.log","a+").write(retVal+"\n")
  return retVal