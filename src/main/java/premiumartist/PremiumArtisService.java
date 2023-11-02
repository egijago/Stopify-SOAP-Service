
package premiumartist;

import jakarta.jws.WebMethod;
import jakarta.jws.WebService;

@WebService
class PremiumArtisService {

    @WebMethod
    public String getArtistInfo(String artistId){
        return "informasi artis premium";
    }

    
}