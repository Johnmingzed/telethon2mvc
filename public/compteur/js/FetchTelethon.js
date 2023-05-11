/**
 * Jonathan PAIN-CHAMMING'S travaille là-dessus, demander avant d'essayer de le modifier
 */

// Fonctions utilitaires pour la récupération des données de l'API Téléthon
export class FetchTelethon {

    static async somme() {
        const url = new URL('https://telethon.lesacteursduweb.fr/?somme');
        return fetch(url).then((response) => response.json());
    }

    static async sum() {
        const url = new URL('https://telethon.lesacteursduweb.fr/?somme');
        try {
            const response = await fetch(url);
            if (response.ok) {
                const data = await response.json();
                return data;
            } else {
                throw new Error('Erreur HTTP : ' + response.status);
            }
        } catch (error) {
            console.error('Erreur sur la promesse : ', error);
        }
    }

    static async partners() {
        const url = new URL('https://telethon.lesacteursduweb.fr/?partenaires');
        try {
            const response = await fetch(url);
            if (response.ok) {
                const data = await response.json();
                return data;
            } else {
                throw new Error('Erreur HTTP : ' + response.status);
            }
        } catch (error) {
            console.error('Erreur sur la promesse : ', error);
        }
    }
}