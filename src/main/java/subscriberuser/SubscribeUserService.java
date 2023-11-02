package subscriberuser;

import jakarta.jws.WebMethod;
import jakarta.jws.WebService;

@WebService
class SubscribeUserService {

    @WebMethod
    public String getUserInfo(String userId){
        return "Informasi pelanggan langganan";
    }

    
}